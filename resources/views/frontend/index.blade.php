@extends('master')

@section('content')

    <div class="container">

        {{-- {{$post->details}} --}}
       
        {{-- <div class="row"> --}}
            
        
        <div class="card-deck">
            @foreach ($post as $row)
            <div class="col-md-4">

            <div class="card mb-2">
                
                    <h4 class="card-header " style="font-family:tahoma; font-size:35px;"><a href="{{url('post/view'.$row->id)}}">{{$row->title}}</a> </h4>
                        <img class="card-img-top" src="{{URL::to($row->image)}}" style="height:300px;width:100%;" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="card-title">Category: {{$row->name}}</h5>
                        <p class="card-text">Post description: {{$row->description}}</p>
                    </div>
                    <div class="card-footer">
                         <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
        

        
            </div>
            </div>
  @endforeach
  
</div>
{{$post->links()}}
</div>

    {{-- </div> --}}
   

@endsection