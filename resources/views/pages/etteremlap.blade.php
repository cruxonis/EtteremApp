@extends('layouts.app')

@section('content')

<h1>{{$post->name}}</h1>
<a class="btn" href="/createFood/{{$post->id}}"><button class="btn" type="submit">Étel hozzáadása az étlaphoz</button></a>
<h3>Étlap:</h3>

<table class="table">
    <thead>
    <tr>
        <th scope="col" style="width: 10%">Menü neve</th>
        <th scope="col" style="width: 10%">Ára</th>
        <th scope="col" style="width: 40%">Leírás</th>
        <th scope="col" style="width: 10%">Hozzávalók</th>
        <th scope="col" style="width: 10%">Kategóriák</th>
    </tr>
    </thead>
    <tbody>
@foreach($menus AS $menu)

    <tr>
        <td>{{$menu->name}}</td>
        <td>{{$menu->price}} Ft</td>
        <td>{{$menu->description}}</td>
        <td>
            <ul>
                @foreach($menu->ingredients as $ingred)
                <li>{{$ingred}}</li>

                @endforeach
            </ul>
        </td>
        <td>
            <ul>
                @foreach($menu->categories as $category)
                <li>{{$category}}</li>

                @endforeach
            </ul>
        </td>
    </tr>
     
    
@endforeach

</tbody>
</table>
<div class="panel-body">
    {{ csrf_field() }}
    <div id="post_data"></div>
   </div>