@extends('backend.admin.home.master')

@section('content')
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
            @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success')}}</div>
            @endif
                <div class="card">
                    <h4 style="text-align:center;  margin-top:30px;">Category Update</h4>
                    <div class="card-body">
                        <form action="{{ url('/category/update/'.$category->id)}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter category name"/>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file"  name="image" class="form-control"/>
                                <img src="{{ asset('/category/'.$category->image) }}"  width="80px" height="80px"/>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
  </div>
@endsection