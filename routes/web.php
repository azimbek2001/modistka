<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminPagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin-panel' , [AdminPagesController::class , 'index'])->name('admin')->middleware(['auth','admin']);
Route::group([
    'middleware' => ['auth','admin'],
    'prefix' => 'admin'
],function($router) {
    Route::get('admin-panel', [AdminPagesController::class, 'index'])->name('admin.admin');
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
});




Route::get('/', function () {
    return view('welcome');
});
Route::get('categories' , [CategoryController::class, 'index']);
Route::get('categories/{id}' , [CategoryController::class, 'show'])->name('category');


