<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::get();
        return view('admin.colors.index',compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'color'=>'required',
        ]);
        Color::create ([
            'name' => $request->name,
            'color' => $request->color,
        ]);
        return redirect()->route('admin.colors.index');
    }


    public function show($id)
    {
        if(!$color = Color::find($id)){
            return abort(404);
        }
        return view('admin.colors.show',compact('color'));
    }


    public function edit(int $id)
    {
        if(!$color = Color::find($id)){
            return abort(404);
        }
        return view('admin.colors.edit',compact('color'));
    }


    public function update(Request $request, $id)
    {
        if(!$color = Color::find($id)){
            return abort(404);
        }
        $color->name = $request->name;
        $color->color = $request->color;
        $color->save();
        return redirect()->route('admin.colors.index');
    }

    public function destroy($id)
    {
        if(!$color = Color::find($id)){
            return abort(404);
        }
        $color->delete();
        return redirect()->route('admin.colors.index');
    }

}
