@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Add Post</h2>
  {!! Form::open(['action' => 'PostController@store','method'=>'POST']) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input  type="text" class="form-control" id="title"  placeholder="Enter title"  name="title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Desctiption</label>
    <textarea  cols="12" rows="3" class="form-control" placeholder="Enter Description"  id="exampleInputPassword1" name="description"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Add Post</button> <button type="submit" class="btn btn-danger pull-right">
  <a style="text-decoration:none;color:white" href="{{config('app.url')}}post">Cancel</a></button>
  {!! Form::close() !!}

 
</div>
            
@endsection