@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Pending</span></h3>
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
         <h3  style="text-align:center; color:gray;margin-top:30px;">Pending products List</h3>
        <div class="container" style="background-color:white; margin-top:30px;">
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                </tr>
          @foreach($products as $product)
                <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                        <img src="{{ asset('/product/'.$product->image) }}" height="80px" width="80px"/>
                        </td>
                        <td>{{  $product->name }}</td>
                        <td>{{  $product->price }}</td>
                        <td>{{  $product->qty }}</td>
                    </tr>
           @endforeach
        
        </table>
        </div>
      </div>
    
    </div>
@endsection