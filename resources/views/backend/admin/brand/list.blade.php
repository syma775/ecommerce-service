@extends('backend.admin.home.master')

@section('content')
  <div class="container-fluid">
    <div class="col-md-12">

           @if(session()->has('success'))
               <div class="alert alert-success">{{ session()->get('success')}}</div>
            @endif
            <h4 style="text-align:center;  margin-top:30px;">Brand List</h4>
      <table class="table table-bordered">
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

       @foreach($brands  as $brand )
        
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $brand ->category->name }}</td>
                <td>{{ $brand ->name }}</td>
                <td>
                    <a href="{{ url('/brand/edit/'.$brand ->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/brand/delete/'.$brand ->id) }}" onclick="return confirm('are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
     </table>
    </div>

    {{ $brands->links() }}
  </div>
@endsection