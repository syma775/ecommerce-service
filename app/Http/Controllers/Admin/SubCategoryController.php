<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories = Category::get();
        return view('backend.admin.subcategory.create',compact('categories'));
    }

    public function subcategoryManage()
    {
        $subcategories = Subcategory::with('category')->paginate(5);
        return view('backend.admin.subcategory.list', compact('subcategories'));
    }

    public function subcategoryStore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name'=> 'required|string',
        ]);

        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','-',strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory has been created');
    }

    public function subcategoryEdit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::get();
        return view('backend.admin.subcategory.edit', compact('subcategory','categories'));
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'name'=> 'required|string',
        ]); 

        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ','-',strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory has been updated');
    }

    public function subcategoryDelete($id)
    {
        $categoryDelete = Subcategory::find($id);
        $categoryDelete->delete();
        return redirect('/subcategory/manage')->with('success','Subcategory has been deleted');
    }
}
