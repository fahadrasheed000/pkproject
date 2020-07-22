@extends('layouts.app')

@section('content')

<div class="container">
<div style=" display: flex;
  flex-wrap: wrap;
  justify-content: space-between;">
  <h2>Post List</h2>
  <button style="float:right" type="submit" class="btn-lg btn-primary">
  <a style="text-decoration:none;color:white" href="{{config('app.url')}}post/create">Add Post</a></button>
  </div>
  <br><br>
@if(count($posts)>0)
    <div class="card">
<ul class="list-group list-group-flush">
@foreach($posts as $post)
<li class="list-group-item">
<h3><a href="{{config('app.url')}}post/{{$post->id}}">{{$post->title}}</a></h3>
<small>{{date('D M, Y h:i A',strtotime($post->created_at))}}</small>
<hr>
<span class="pull-right"><a style="color:red" href="{{config('app.url')}}post/{{$post->id}}/destroy/">Delete</a></span>&nbsp;
<span class="pull-right"><a style="color:blue" href="{{config('app.url')}}post/{{$post->id}}/edit">Edit</a></span>

</li>
@endforeach
</ul>
    </div>
   
@else
<div class="alert alert-danger">No Data Found</div>

@endif
 
</div>
            
@endsection