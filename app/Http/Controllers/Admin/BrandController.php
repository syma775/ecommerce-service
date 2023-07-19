<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandCreate()
    {
        $categories = Category::get();
        return view('backend.admin.brand.create',compact('categories'));
    }

    public function brandStore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $brand = new Brand();
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-',strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success','Brand has been created');
    }

    public function brandManage()
    {
        $brands = Brand::with('category')->paginate(5);
        return view('backend.admin.brand.list', compact('brands'));
    }

    public function brandDelete($id)
    {
        $brandDelete = Brand::find($id);
        $brandDelete->delete();
        return redirect('/brand/manage')->with('success','Brand has been deleted');
    }

    public function brandEdit($id)
    {
        $brand = Brand::find($id);
        $categories = Category::get();
        return view('backend.admin.brand.edit',compact('brand','categories'));
    }

    public function brandUpdate(Request $request ,$id)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name'=> 'required|string',
        ]); 

        $brand = Brand::find($id);
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ','-',strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success','Brand has been updated');
    }
}
