@extends('layouts.app')

@section('content')
<h1>Mai Ajánlatunk</h1>
@if (count($points)>0)
    @foreach ($points as $point)
    <div class="well">
        <h3>{{$point->name}}</h3>
        <small>Étterem típusa: {{$point->type}}</small>
    </div>
    
    @endforeach
    
@endif


@endsection