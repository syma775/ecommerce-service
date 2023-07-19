@extends('backend.admin.home.master')

@section('content')
  <div class="container-fluid">
    <div class="col-md-12">

            @if(session()->has('success'))
               <div class="alert alert-success">{{ session()->get('success')}}</div>
            @endif
            <h4 style="text-align:center;  margin-top:30px;">Category List</h4>
      <table class="table table-bordered">
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach($categories as $category)
        
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <img src="{{ asset('/category/'.$category->image) }}" height="80px" width="80px"/>
                </td>
                <td>
                    <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/category/delete/'.$category->id) }}" onclick="return confirm('are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
     </table>
    </div>
  </div>
@endsection