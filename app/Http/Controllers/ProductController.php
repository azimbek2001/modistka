<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products',compact('products'));
    }

    public function show($id)
    {
        if(!$product = Product::find($id)){
            return abort(404);
        }
        return view('product',compact('product'));
    }
}
