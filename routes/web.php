<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController as ProductControllerAlias;
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
    Route::get('colors' , [ColorController::class, 'index'])->name('admin.colors.index') ;
    Route::get('colors/create' , [ColorController::class, 'create'])->name('admin.colors.create') ;
    Route::get('colors/edit/{id}' , [ColorController::class, 'edit'])->name('admin.colors.edit') ;
    Route::post('colors/store' , [ColorController::class, 'store'])->name('admin.colors.store') ;
    Route::post('colors/destroy/{id}' , [ColorController::class, 'destroy'])->name('admin.colors.destroy');
    Route::post('colors/update/{id}' , [ColorController::class, 'update'])->name('admin.colors.update') ;
    Route::group(['prefix' => 'orders'], function($router){
        Route::get('/' , [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index') ;
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');
        Route::put('archive/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'archive'])->name('admin.orders.archive');
    });
    Route::group(['prefix'=>'products'],function($router){
        Route::get('/' , [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index') ;
        Route::get('create' , [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create') ;
        Route::get('edit/{id}' , [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit') ;
        Route::post('store' , [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store') ;
        Route::post('destroy/{id}' , [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');
        Route::post('update/{id}' , [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update') ;
    });
});




Route::get('/', function () {
    return view('welcome');
});
Route::get('categories' , [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{id}' , [CategoryController::class, 'show'])->name('category');
Route::get('products/{id}',[ProductController::class , 'show'])->name('product.show');
Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::get('orders',[OrderController::class,'create'])->name('orders.create');
Route::post('orders/store',[OrderController::class,'store'])->name('orders.store');

Route::get('/about-us',function (){
    return view('about');
})->name('about');
//    CART
Route::get('/add-to-cart', [CartController::class, 'addToCart'])->name('addProduct.toCart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::put('/update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('/delete-product', [CartController::class, 'remove'])->name('delete.product');
Route::delete('/clear-product', [CartController::class, 'clear'])->name('clear.cart');
