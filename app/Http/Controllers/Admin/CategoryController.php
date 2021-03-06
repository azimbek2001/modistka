<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::has('products')->get();
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $path = $request->file('image')->store('public/categories');
        Category::create ([
            'image' => $path,
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        if(!$category = Category::find($id)){
            return abort(404);
        }

        return view('admin.categories.show',compact('category'));
    }


    public function edit($id)
    {
        if(!$category = Category::find($id)){
            return abort(404);
        }
        return view('admin.categories.form',compact('category'));
    }


    public function update(Request $request, $id)
    {
        if(!$category = Category::find($id)){
            return abort(404);
        }

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                Storage::delete($category->image);
                $path = $request->file('image')->store('public/categories');
                $category->image = $path;
            }
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$category = Category::find($id)){
            return abort(404);
        }
        $category->delete();
        return redirect()->route('categories.index');
    }
}
