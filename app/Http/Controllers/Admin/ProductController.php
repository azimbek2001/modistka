<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id' , 'desc')->get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.products.create',compact('colors','categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'sizes' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $path = $request->file('image')->store('public/products');
        $tmp = explode('/', $path);
        $path = $tmp[1] . '/' . $tmp[2];
        $product = Product::create ([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
            'sizes' => $request->sizes,
            ]);

            $product->colors()->attach($request->colors);

        return redirect()->route('admin.products.index');
    }

    public function edit(int $id)
    {
        if(!$product = Product::find($id)){
            return abort(404);
        }
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.products.edit',compact('product','categories','colors'));
    }


    public function update(Request $request, $id)
    {
        if(!$product = Product::find($id)){
            return abort(404);
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sizes = $request->sizes;
        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                Storage::delete($product->image);
                $path = $request->file('image')->store('public/products');
                $product->image = $path;
            }
        }
        $product->colors()->detach();
        $product->colors()->attach($request->colors);
        $product->save();
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        if(!$product = Product::find($id)){
            return abort(404);
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
