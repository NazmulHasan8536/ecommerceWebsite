@extends('master')


@section('content')



<div class="container">
    <div class="row">
          <div class="col-md-4">
            <a href="{{route('AllPost')}}" class="btn btn-outline-success">All post</a>
          </div>
          <div class="col-md-4">
            <a href="{{route('AddPost')}}" class="btn btn-outline-primary">Add Post</a>
          </div>
          <div class="col-md-4">
            <a href="{{route('AllCategory')}}" class="btn btn-outline-success">All Category</a>
          </div>
    </div>
</div>


<div class="container mt-5">
    {{-- <div class="row"> --}}


        {{-- error message  --}}
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- end error message  --}}


        <h2 class="text-uppercase text-bold bg-primary text-light">Insert New Category</h2>

    <form action="{{url('/category/update/'.$category->id)}}"  method="Post">
    @csrf
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Title</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}" id="title" placeholder="Title of the post">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <br>

      <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
        <input type="text" class="form-control" name="description" value="{{$category->slug}}">
        </div>
      </div>
      <br>
      <br>
      <div id="success"></div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-success" >Update Category</button>
        
      </div>
    </form>
   </div>





@endsection