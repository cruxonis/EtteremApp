@extends('layouts.app')

@section('content')
<h1>Mai Ajánlatunk</h1>
@if (count($points)>0)
    @foreach ($points as $point)
    <div class="well">
        <a href={{$point->link}}><h3>{{$point->name}}</h3></a>
        
        <small> {{$point->type}}</small>
    </div>
    
    @endforeach
    
    <span>
        {{$points->links()}}
    </span>

@endif


@endsection