<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Order_details;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customerOrders(Request $request)
    {
        //dd($request->from);
        $sql = Order::with('vendor','user','products')->orderBy('created_at','desc');
        if(isset($request->from) && isset($request->to))
        {
           $sql->whereDate('created_at','>=',$request->from)->whereDate('created_at','<=',$request->to);
           $orders = $sql->get();
           return view('backend.admin.order.orders',compact('orders'));
        }
        $orders = $sql->get();
        return view('backend.admin.order.orders',compact('orders'));
    }
}
