@extends('master')


@section('content')




<div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="{{route('AllCategory')}}" class="btn btn-outline-success">All Category</a>
      </div>
      <div class="col-md-3">
        
        <a href="{{route('AddCategory')}}" class="btn btn-outline-primary">Add Category</a>
      </div>
      <div class="col-md-3">
        <a href="{{route('post')}}" class="btn btn-outline-success">All post</a>
      </div>
      <div class="col-md-3">
        <a href="{{route('AddPost')}}" class="btn btn-outline-primary">Add Post</a>
      </div>
    </div>
  </div>
  


  <div class="container">



    {{-- @foreach ($category as $cat)
        
    @endforeach --}}


    <table class="table table-striped">
      <thead>
        <tr>
          <th>Category ID</th>
          <th>Category Name</th>
          <th>Category Description</th>
          <th class="text-center">Action</th>
          {{-- <th>cre</th> --}}
        </tr>
      </thead>
      <tbody>

        @foreach ($category as $cat)

        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->slug}}</td>
            <td>
            <a href="{{url('/category/view/'.$cat->id)}}" class="btn btn-outline-success">View</a>
                <a href="{{url('/category/edit/'.$cat->id)}}" class="btn btn-outline-primary">Edit</a>
            <a href="{{url('/category/delete/'.$cat->id)}}" class="btn btn-outline-danger">Delete</a>
            </td>
          </tr>
            
        @endforeach

      </tbody>
    </table>

    
  </div>





@endsection