@extends('layouts.app')

@section('content')
<h1>Andj hozzá ételt</h1>

{!!Form::open(['action'=>'PointsController@store', 'method'=>'POST'])!!}
    <div class="form-group">
        {{Form::label('title', 'Étterem neve')}}
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=> 'Menő étterem'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Típus')}}
        {{Form::select('type',['Restaurant'=>'Étterem','Bar'=>'Bár','Pub'=>'Pub','Buffet'=>'Büfé', 'Fastfood'=>'Gyorsétterem'])}}
    </div>
    {{Form::submit('Mentés', ['class'=>'btn-primary'])}}
    {!! Form::close()!!}
<p>pp</p>

    @endsection

