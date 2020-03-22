@extends('master')


@section('content')



<div class="container">
    <div class="row">
          <div class="col-md-6 text-left">
            <a href="{{route('AllPost')}}" class="btn btn-outline-success">All post</a>
          </div>
         
          <div class="col-md-6 text-right">
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


        <h2 class="text-uppercase text-bold text-dark text-center">Insert New Post</h2>

    <form action="{{route('allStore')}}"  method="Post" enctype="multipart/form-data">
    @csrf
      {{-- <div class="control-group"> --}}
        <div class="form-group floating-label-form-group controls">
          <label>Title</label>
          <input type="text" class="form-control" name="title" placeholder="title" id="title" placeholder="Title of the post">
          <p class="help-block text-danger"></p>
        </div>
      {{-- </div> --}}

      <div class="form-group floating-label-form-group controls">
        <label for="category">Category</label>
        <select name="category_id" id="category" class="form-control mt-2 mb-2">
          @foreach ($category as $cat)
          
        <option value="{{$cat->id}}">{{$cat->name}}</option>
          @endforeach
        </select>
      </div>


      <div class="form-group col-xs-12 floating-label-form-group controls">
        <input type="file" class="form-control" name="image" required>
      </div>

  

      <div class="control-group mt-3">
        <label for="details">Product Details</label>
        <textarea name="description" id="" class="form-control" id="details" cols="30" rows="10" required >

        </textarea>
      
      </div>
      <br>
      <br>
      <div id="success"></div>
      <div class="form-group mt-3">
        <button type="submit" class="btn btn-outline-success" >Add Post</button>
        
      </div>
    </form>
   </div>





@endsection