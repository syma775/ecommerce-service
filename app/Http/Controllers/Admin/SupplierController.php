<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function vendors()
    {
        $vendors = Vendor::orderBy('created_at','desc')->get();
        return view('backend.admin.supplier.list',compact('vendors'));
    }

    public function vendorApprove($id)
    {
        $vendor = Vendor::find($id);
        $vendor->is_approved = 1;
        $vendor->save();
        return redirect()->back()->with('success','Vendor has been approved');
    }

    public function vendorPending($id)
    {
        $vendor = Vendor::find($id);
        $vendor->is_approved = 0;
        $vendor->save();
        return redirect()->back()->with('success','Vendor has been pending');
    }

    public function vendorDelete($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->back()->with('success','Vendor has been deleted');
    }

    public function vendorProducts()
    {
        $products = Product::with('category','color','size')->get();
        return view('backend.admin.supplier.products',compact('products'));
    }

    public function vendorProductApprove($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back()->with('success','Vendor Product has been approved');
    }

    public function vendorProductPending($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->back()->with('success','Vendor product has been pending');
    }

    public function vendorProductDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Vendor product has been deleted');
    }

    public function vendorOrders()
    {
        $orders = Order::with('vendor','user','products')->where('vendor_id',session()->get('vendorId'))->get();
        // dd($orders);
        return view('frontend.vendor.orders',compact('orders')); 
    }

    public function vendorPendingProduct()
    {
        $products = Product::where('status',0)->where('vendor_id',session()->get('vendorId'))->get();
        return view('frontend.vendor.pending',compact('products')); 
    }

    public function vendorApprovedProduct()
    {
        $products = Product::where('status',1)->where('vendor_id',session()->get('vendorId'))->get();
        return view('frontend.vendor.approve',compact('products')); 
    }
}
