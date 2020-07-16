@extends('layouts.app')

@section('content')


                <center><h1>Service Page<h1></center>
                <ul>
                @if(count($services)>0)
@foreach($services as $service)
<li>{{$service}}</li>
@endforeach
</ul>



                @endif
            
@endsection