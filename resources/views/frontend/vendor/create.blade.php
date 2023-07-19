@extends('frontend.master')

@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ url('/') }}">Home</a> / <span>Dashboard</span></h3>
        </div>
    </div>

    <div class="container-fluid" style="background-color:white;">
      <div class="card">
         <h3  style="text-align:center; color:gray;margin-top:30px;">Products Create</h3>
         <a href="{{ url('/vendor/dashboard') }}" class="btn btn-sm btn-success" style="float:right; margin-Right:180px; margin-bottom:20px;">Product List</a>
        <div class="container" style="background-color:white; margin-top:30px;">
         @if(session()->has('success'))
           <div class="alert alert-success" style="margin-top:20px;">{{ session()->get('success')}}</div>
         @endif
           <form action="{{ url('/vendor/product/store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Product Type</label>
                <select class="form-control" name="type">
                    <option selected disabled>Select A Product Type</option>
                    <option value="new">New Arrivals</option>
                    <option value="hot">Hot Products</option>
                    <option value="discount">Discounted Products</option>
                </select>
              </div>

              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    <option selected disabled>Select A Category</option>
                    @foreach($categories as $category)
                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Color</label>
                <select class="form-control" name="color_id">
                    <option selected disabled>Select A Color</option>
                    @foreach($colors  as $color )
                       <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="size_id">
                    <option selected disabled>Select A Size</option>
                    @foreach($sizes  as $size )
                       <option value="{{ $size ->id }}">{{ $size ->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="please enter Product price "/>
              </div>

              <div class="form-group">
                <label>Quantity</label>
                <input type="number" min="1" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="please enter Product qty"/>
              </div>

              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control"/>
              </div>

              <div class="form-group">
                <label>Short Description</label>
                <input type="text" name="short_description" value="{{ old('short_description') }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Long Description</label>
                <input type="text" name="long_description" value="{{ old('long_description') }}" placeholder="enter your product details" class="form-control"/>
              </div>

              <div class="form-group">
                <label>Gallery Image</label>
                <input type="file" name="multi_image[]" multiple class="form-control"/>
              </div>

             <button type="submit" class="btn btn-sm btn-success" style="margin-bottom:30px;">Submit</button>

           </form>
        </div>
      </div>
    
    </div>
@endsection