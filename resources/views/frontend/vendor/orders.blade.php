@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Orders</span></h3>
        </div>
    </div>
 <div class="container-fluid" style="background-color:white;">
 
      <div class="card">
           
    <nav>
        <ul>
            <li>
                <a href="{{ url('/vendor/orders') }}">Orders</a>
            </li>

            <li>
                <a href="{{ url('/vendor/pending/product') }}">Pending Products</a>
            </li>
            <li>
                <a href="{{ url('/vendor/aproved/product') }}">Approved Products</a>
            </li>
        </ul>
    </nav>
         <h3  style="text-align:center; color:gray;margin-top:30px;">Orders List</h3>
        <div class="container" style="background-color:white; margin-top:30px;">
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
            </tr>
          @foreach($orders as $order)
                <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                        <img src="{{ asset('/product/'.$order->products->image) }}" height="80px" width="80px"/>
                        </td>
                        <td>{{  $order->products->name }}</td>
                        <td>{{  $order->products->price }}</td>
                        <td>{{  $order->products->qty }}</td>
                    </tr>
           @endforeach
        
        </table>
        </div>
      </div>
    
    </div>
@endsection