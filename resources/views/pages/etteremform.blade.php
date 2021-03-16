@extends('layouts.app')

@section('content')
<h1>Andj hozzá éttermet</h1>

{!!Form::open(['action'=>'PointsController@store', 'method'=>'POST', 'id'=>'PointsForm'])!!}
    <div class="form-group">
        {{Form::label('title', 'Étterem neve')}}
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=> 'Menő étterem', 'id'=>'namepoints'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Típus')}}
        {{Form::select('type',['Restaurant'=>'Étterem','Bar'=>'Bár','Pub'=>'Pub','Buffet'=>'Büfé', 'Fastfood'=>'Gyorsétterem'])}}
    </div>
    {{Form::submit('Mentés', ['class'=>'', 'id'=>'submit-points', 'disabled'=>'disabled'])}}
    {!! Form::close()!!}
    <script>
        PointsForm.addEventListener('input', () =>{
            if(namepoints.value.length>=3){
            document.getElementById("submit-points").disabled = false;
            //document.getElementById("submit-points").class = 'btn-primary';
            
        }})
        
        

        
    </script>
@endsection