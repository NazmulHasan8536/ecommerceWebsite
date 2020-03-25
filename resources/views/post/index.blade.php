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
      <a href="{{route('AllPost')}}" class="btn btn-outline-success">All post</a>
    </div>
    <div class="col-md-3">
      <a href="{{route('AddPost')}}" class="btn btn-outline-primary">Add Post</a>
    </div>
  </div>
</div>



 

<div class="container">
  



<div class="container mt-4">



  {{-- @foreach ($category as $cat)
      
  @endforeach --}}


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Image</th>
        <th class="text-center">Action</th>
        {{-- <th>cre</th> --}}
      </tr>
    </thead>
    <tbody>

      @foreach ($post as $row)

      <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->title}}</td>
          <td>{{$row->name}}</td>
          <td>{{$row->description}}</td>
      <td><img src="{{URL::to($row->image)}}" style="height:40px;width:90px;" alt=""></td>
          <td>
            <div class="row">
              <a href="{{url('/post/view/'.$row->id)}}" class="btn btn-outline-success">View</a>
              <a href="{{url('/post/edit/'.$row->id)}}" class="btn btn-outline-primary">Edit</a>
              <a href="{{url('/post/delete/'.$row->id)}}" class="btn btn-outline-danger">Delete</a>
          
            </div>
         </td>
        </tr>
          
      @endforeach

    </tbody>
  </table>

  
</div>

    
@endsection