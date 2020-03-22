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
  


<div class="container mt-4">

<h2 class='mb-3'>Title Name:  {{$post->title}}</h2>
<img  src="{{URL::to($post->image)}}" style="height:340px;" alt="">
<p>Category Name: {{$post->name}}</p>
<p>Details: {{$post->description}}</p>
</div>

@endsection