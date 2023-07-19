<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizeCreate()
    {
        $categories = Category::get();
        return view('backend.admin.size.create',compact('categories'));
    }

    public function sizeStore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $size = new Size();
        $size->category_id = $request->category_id;
        $size->name = $request->name;
        $size->status = $request->boolean('status');
        $size->save();
        return redirect()->back()->with('success','Size has been created');
    }

    public function sizeManage()
    {
        $sizes = Size::get();
        return view('backend.admin.size.list',compact('sizes'));
    }

    public function sizeDelete($id)
    {
        $sizeDelete = Size::find($id);
        $sizeDelete->delete();
        return redirect('/size/manage')->with('success','Size has been deleted');
    }

    public function sizeEdit($id)
    {
        $size = Size::find($id);
        $categories = Category::get();
        return view('backend.admin.size.edit',compact('size','categories'));
    }

    public function sizeUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $size = Size::find($id);
        $size->category_id = $request->category_id;
        $size->name = $request->name;
        $size->status = $request->boolean('status');
        $size->save();
        return redirect()->back()->with('success','Size has been updated');
    }
}
