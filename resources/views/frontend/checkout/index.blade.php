@extends('frontend.master')

@section('content')

<!--banner-->
<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
			<form action="{{ url('/customer/details/for-order') }}" method="post">
				@csrf
				<div class="container">
					 <h2>My Shopping Bag</h2>
					 <div class="cart-header">
                        <table class="table table-bordered">
							<tr>
								<th>Sl</th>
								<th>Name</th>
								<th>Price</th>
								<th>qty</th>
								<th>Total Price</th>
								<th>Action</th>
							</tr>
							@php
							  $sum = 0;
							  $qty = 0;
							@endphp
                          @foreach($products as $cartProduct)

						  <tr>
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $cartProduct->product ? $cartProduct->product->name : 'No Product Found' }}</td>
								<input type="hidden" name="product_id" value="{{ $cartProduct->product_id }}"/>
								<input type="hidden" name="vendor_id" value="{{ $cartProduct->vendor_id }}"/>
								<td>{{ $cartProduct->price }}</td>
								<td>
									<form action="{{ url('/cart/product/update/'.$cartProduct->id) }}" method="post">
										@csrf
										<input type="number" name="qty" value="{{ $total_qty = $cartProduct->qty }}"/><button type="submit" class="btn btn-sm btn-success" name="btn">Update</button>
									</form>
								</td>
								<td>{{ $total_price = $cartProduct->price * $cartProduct->qty }}</td>
								<td>
									<a href="{{ url('/cart/product/delete/'.$cartProduct->id) }}" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>

							@php
						      $sum+= $total_price;
							  $qty+= $total_qty;
						  @endphp
						    
						  @endforeach
						  
						  <tr>
							<td colspan="3">subtotal</td>
							<td colspan="6">{{ $sum }}</td>
						  </tr>
							
						</table>
                </div>
				<h2><center>Shipping and Billing Information</center></h2>
				<hr/>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
								<input type="hidden" name="total_price" value="{{ $sum }}"/>
								<input type="hidden" name="total_qty" value="{{ $qty }}"/>
								<input type="hidden" name="order_id" value="{{ auth()->check() ? auth()->user()->id : old('id') }}"/>
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" class="form-control" placeholder="Enter Customer Name"/>
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" class="form-control" placeholder="Enter Customer Email"/>
								</div>

								<div class="form-group">
									<label>Phone</label>
									<input type="tel" name="phone" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}" class="form-control" placeholder="Enter Customer Phone"/>
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" name="address" placeholder="Enter Customer Address">{{ auth()->check() ? auth()->user()->address: old('address') }}</textarea>
								</div>

								<button type="submit" class="btn btn-block btn-primary">Submit</button>
							
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
				
            </diV>
			</form>
		</div>
	<!-- checkout -->	
@endsection