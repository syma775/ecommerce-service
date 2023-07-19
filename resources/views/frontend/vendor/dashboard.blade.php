@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
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
         <h3  style="text-align:center; color:gray;margin-top:30px;">Products List</h3>
         <a href="{{ url('/vendor/product/create') }}" class="btn btn-sm btn-success" style="float:right; margin-Right:180px; margin-bottom:20px;">Add Product</a>
        <div class="container" style="background-color:white; margin-top:30px;">
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
           @foreach($products as $product)
                <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <img src="{{ asset('/product/'.$product->image) }}" height="80px" width="80px"/>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>
                            @if($product->status == 0)
                              <span class="badge badge-danger">Pending</span>
                            @else
                            <span class="badge badge-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/vendor/products/edit/'.$product->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ url('/vendor/products/delete/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
           @endforeach
        
        </table>
        </div>
      </div>
    
    </div>
@endsection