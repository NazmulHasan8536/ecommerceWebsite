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



 

    
@endsection