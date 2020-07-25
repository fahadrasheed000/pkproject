@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Edit Post</h2>
 
@if(count($posts)>0)
{!! Form::open(['action' => ['PostController@update',$posts->id],'method'=>'PUT']) !!}
<form method="PUT" action="{{config('app.url')}}post/store">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input  required="true" type="text" class="form-control" id="title"  placeholder="Enter title" value="{{$posts->title}}" name="title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Desctiption</label>
    <textarea  required="true" cols="12" rows="3" class="form-control" placeholder="Enter Description"  id="exampleInputPassword1" name="description">{{$posts->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> 
  <button type="submit" class="btn btn-danger pull-right">
  <a style="text-decoration:none;color:white" href="{{config('app.url')}}post">Cancel</a></button>
  {!! Form::close() !!}
@else
<div class="alert alert-warning">No data found</div>
@endif
 
</div>
            
@endsection