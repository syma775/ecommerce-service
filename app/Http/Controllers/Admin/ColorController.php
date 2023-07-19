<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colorCreate()
    {
        $categories = Category::get();
        return view('backend.admin.color.create', compact('categories'));
    }

    public function colorStore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $color = new Color();
        $color->category_id = $request->category_id;
        $color->name = $request->name;
        $color->status = $request->boolean('status');
        $color->save();
        return redirect()->back()->with('success','Color has been created');
    }

    public function colorManage()
    {
        $colors = Color::get();
        return view('backend.admin.color.list',compact('colors'));
    }

    public function colorDelete($id)
    {
        $colorDelete = Color::find($id);
        $colorDelete->delete();
        return redirect('/color/manage')->with('success','Color has been deleted');
    }

    public function colorEdit($id)
    {
        $color = Color::find($id);
        $categories = Category::get();
        return view('backend.admin.color.edit',compact('color','categories'));
    }

    public function colorUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $color = Color::find($id);
        $color->category_id = $request->category_id;
        $color->name = $request->name;
        $color->status = $request->boolean('status');
        $color->save();
        return redirect()->back()->with('success','Color has been updated');
    }
}
