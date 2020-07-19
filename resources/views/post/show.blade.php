@extends('layouts.app')

@section('content')

<div class="container">
  <h2>View Post</h2>
 
@if(count($posts)>0)
<form method="post" action="{{config('app.url')}}post/store">
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input disabled="true" required="true" type="text" class="form-control" id="title"  placeholder="Enter title" value="{{$posts->title}}" name="title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Desctiption</label>
    <textarea disabled="true" required="true" cols="12" rows="3" class="form-control" placeholder="Enter Description"  id="exampleInputPassword1" name="description">{{$posts->description}}</textarea>
  </div>
  <div class="form-check">
    <input type="hidden" name="id" value="{{$posts->id}}">
   
  </div>
  <!-- <button type="submit" class="btn btn-primary">Submit</button>  -->
  <button type="submit" class="btn btn-danger pull-right">
  <a style="text-decoration:none;color:white" href="{{config('app.url')}}post">Cancel</a></button>
</form>
@else
<div class="alert alert-warning">No data found</div>
@endif
 
</div>
            
@endsection