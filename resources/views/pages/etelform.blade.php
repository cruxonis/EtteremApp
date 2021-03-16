@extends('layouts.app')

@section('content')
<h1>Andj hozzá ételt</h1>


{!!Form::open(['action'=>'FoodsController@store', 'method'=>'POST'])!!}
<div class="form-group">

    <div class="form-group">
        @if(is_null( request()->route('id')))
        {{Form::label('type', 'Étterem:')}}
        <select class="form-control" name="item_id">
          @foreach($points as $point)
          
            <option value="{{$point->id}}">{{$point->name}}</option>
        
          @endforeach
          @else
          <h1>{{$points2->name}}</h1>
          {{ Form::hidden('item_id', $points2->id) }}
        @endif
        </select>
      </div>
</div>    
  
<div class="form-group">
        {{Form::label('title', 'Menü neve')}}
        {{Form::text('title', '', ['class'=>'form-group', 'placeholder'=> 'Finom étel'])}}
        {{Form::label('price', 'Menü ára (Forint)')}}
        {{Form::text('price', '', ['class'=>'form-group', 'placeholder'=> 'Csak számot írj'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Étel leírása')}}
        {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=> 'írj valamit az ételről'])}}
    </div>
    <div>
        {{Form::label('ingredients', 'Mik a hozzávalók')}}
        {{Form::textarea('ingredients', '', ['class'=>'form-control', 'placeholder'=> 'Írd le hogy mik a hozzávalók'])}}
    </div>
    <div>
        {{Form::label('categories', 'Kategóriák')}}
        {{Form::textarea('categories', '', ['class'=>'form-control', 'placeholder'=> 'Pl: vegetariánus'])}}
    </div>
    
    {{Form::submit('Mentés', ['class'=>'btn-primary'])}}
    {!! Form::close()!!}


    @endsection

