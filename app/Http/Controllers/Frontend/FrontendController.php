<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
       // $categories = Category::with('subcategory')->get();
        $new_products = Product::with('category','color','size')->where('type','new')->where('status',1)->get();
        $hot_products = Product::with('category','color','size')->where('type','hot')->where('status',1)->get();
        $discount_products = Product::with('category','color','size')->where('type','discount')->where('status',1)->get();
        return view('frontend.home.index',compact('new_products','hot_products','discount_products'));
    }

    //user authentication route

    public function userRegistration()
    {
        return view('frontend.user.auth');
    }

    public function productDetails($id)
    {
        $products = Product::with('reviews')->find($id);
        return view('frontend.home.product-details',compact('products'));
    }

    //review 

    public function customerReview(Request $request)
    {
        // $this->validate($request,[
        //     'rating' => 'required|integer',
        //     'message'=> 'string'
        // ]);

        $rating = new Review();
        $rating->user_id = auth()->user()->id;
        $rating->product_id = $request->product_id;
        $rating->rating = $request->rating;
        $rating->message = $request->message;
        $rating->save();
        return redirect()->back()->with('success','Thanks For Rating.');

    }
}
