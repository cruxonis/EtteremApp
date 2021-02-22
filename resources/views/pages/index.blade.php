@extends('layouts.app')

@section('content')

<div>
    <a class="btn" href="/createPoint"><button class="btn" type="submit">Étterem hozzáadása</button></a>
    <a class="btn" href="/createFood"><button class="btn" type="submit">Étel hozzáadása</button></a>
</div>
<h1>Mai Ajánlatunk</h1>


<div class="panel-body">
    {{ csrf_field() }}
    <div id="post_data"></div>
   </div>
   

    
    


    

<hr>

@endsection