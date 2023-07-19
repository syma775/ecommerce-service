@extends('frontend.master')

@section('content')
<div class="banner1">
			<div class="container">
				<h3><a href="{{ url('/') }}">Home</a> / <span>Register</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
	<div class="card">
		<div class="card-body"style="background-color:white;">
			<div class='container'>
			   <div class="col-md-12">
				<div class="row">
					<div class="col-md-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height:100vh; margin-top:100px; padding:30px;margin-bottom:30px;">
					       @if(session()->has('success'))
					          <div class="alert alert-success">{{ session()->get('success')}}</div>
					          @endif
							  @if(session()->has('error'))
					          <div class="alert alert-danger">{{ session()->get('error')}}</div>
					          @endif
					<h3 style="margin-top:30px; margin-bottom:20px;"> Login</h3>
					<form action="{{ route('register') }}" method="post">
						@csrf
						<label>Email</label>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Enter your valid email"/>
						</div>

						<label>Password</label>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter your password"/>
						</div>

						<button type="submit" class="btn btn-primary" name="btn">Login</button>
					</form>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height:100vh; margin-top:100px;padding:30px;margin-bottom:30px;">
							@if(session()->has('success'))
					          <div class="alert alert-success">{{ session()->get('success')}}</div>
					          @endif
					<h3 style="margin-top:30px;margin-bottom:20px;">Registration From</h3>
					<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
						@csrf
						<label>name</label>
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Enter your name"/>
						</div>

						<label>Email</label>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Enter your valid email"/>
						</div>

						<label>Phone</label>
						<div class="form-group">
							<input type="tel" class="form-control" name="phone" placeholder="Enter your phone"/>
						</div>

						<label>Address</label>
						<div class="form-group">
							<textarea  class="form-control" name="address" rows="5" placeholder="Enter your address"></textarea>
						</div>


						<label>Password</label>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter your password"/>
						</div>

						

						<button type="submit" class="btn btn-primary" name="btn">Register</button>
					</form>
					</div>
				</div>
			</div>
	      </div>
		</div>
	</div>
	
		
@endsection