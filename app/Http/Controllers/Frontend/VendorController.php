<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class VendorController extends Controller
{
    public function vendorRegister()
    {
        return view('frontend.vendor.auth');
    }

    public function vendorLoginForm()
    {
        return view('frontend.vendor.auth');
    }


    public function vendorRegistration(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|integer',
            'address' => 'required|string',
            'password' => 'required|string',
        ]);

        if($request->file('logo')){
            $name = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('/avatar/'),$name);
        }

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->password = bcrypt($request->password);
        $vendor->logo = $name;
        $vendor->save();
        return redirect()->back()->with('success','your registration has been  complete,wait for admin approval.'); 
    }

    public function vendorLogin(Request $request)
    {
        $vendor = Vendor::where('email',$request->email)->first();
        if($vendor->is_approved == 0){
            return redirect()->back()->with('error','you are not approved vendor.');
        }
        if(!$vendor){
            return redirect()->back()->with('error','you are not valid vendor,please register.');
        }else{
            if(password_verify($request->password,$vendor->password)){
                session::put('vendorId',$vendor->id);
                session::put('vendorName',$vendor->name);
                return redirect('/vendor/dashboard');
            }else{
                return redirect()->back()->with('error','password not match.');
            }
        }
       
    }

    public function vendorDashboard()
    {
       $products = Product::with('category','color','size')->where('vendor_id',session()->get('vendorId'))->get();
        return view('frontend.vendor.dashboard',compact('products'));
    }

    public function vendorProductCreateFrom()
    {
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('frontend.vendor.create', compact('categories','colors','sizes'));
    }

    public function vendorProductStore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|integer',
            'color_id' => 'required|integer',
            'size_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|integer',
            'qty' => 'required|integer',
            'image'=> 'required',
        ]);

        if($request->file('image')){
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('/product/'),$name);
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->vendor_id = session()->get('vendorId');
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->type = $request->type;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $name; 

        if($request->hasFile('multi_image')){
            foreach($request->file('multi_image') as $images){
                $imagesName = rand(999, 9999).'.'.$images->extension();
                $images->move(public_path('/gallery/'),$imagesName);
                $data[] = $imagesName;
            }
        }

        $product->multi_image = json_encode($data);
        $product->save();
        return redirect()->back()->with('success','Product has been created');
    }

    
    public function vendorProductsDelete($id)
    {
        $vendorProductDelete = Product::find($id);
        $vendorProductDelete->delete();
        return redirect()->back()->with('success','vendor product has been deleted.');
    }

    public function vendorProductsEdit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('frontend.vendor.productedit',compact('categories','colors','sizes','product'));
    }

    public function vendorLogout()
    {
        session()->flush();
        return redirect('/')->with('success','you are Logout.');
    }

    public function vendorProductsUpdate(Request $request,$id)
    {
        // $this->validate($request,[
        //     'category_id' => 'required|integer',
        //     'color_id' => 'required|integer',
        //     'size_id' => 'required|integer',
        //     'name' => 'required|string',
        //     'price' => 'required|integer',
        //     'qty' => 'required|integer',
        //     'image'=> 'required',
        // ]);
        $product =Product::find($id);

        if($request->file('image')){
            $name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/product/'),$name);
            $product->image = $name; 
        }

       
        $product->category_id = $request->category_id;
        $product->vendor_id = session()->get('vendorId');
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->type = $request->type;

        if($request->hasFile('multi_image')){
            foreach($request->file('multi_image') as $images){
                $imagesName = rand(999, 9999).'.'.$images->extension();
                $images->move(public_path('/gallery/'),$imagesName);
                $data[] = $imagesName;
            }
            $product->multi_image = json_encode($data);
        }

        $product->save();
        return redirect()->back()->with('success','Product has been updated');
    }
  

}
