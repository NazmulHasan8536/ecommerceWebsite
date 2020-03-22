@extends('master')


@section('content')
    <div class="container">
        
        <ol>
            <li>Category id : {{$category->id}}</li>
            <li>Category id : {{$category->name}}</li>
            <li>Category id : {{$category->slug}}</li>
             </ol>
    
    </div>    
@endsection