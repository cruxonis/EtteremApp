@extends('layouts.app')

@section('content')

<h1>{{$post->name}}</h1>
<a class="btn" href="/createFood/{{$post->id}}"><button class="btn" type="submit">Étel hozzáadása az étlaphoz</button></a>
<h3>Étlap:</h3>


<div class="panel-body">
    {{ csrf_field() }}
    <div id="post_data"></div>
   </div>

   
   
   <script>
    function notInStore(element){

      var id= "buttonId"+element;
      document.getElementById(id).disabled = true;
      sendAjaxRequestButton(element, _token);
     }
 
    function sendAjaxRequestButton(id="", _token)
      {
        $.ajax({
          url:"{{ route('loadmore.not_stored') }}",
          method:"POST",
          data:{id:id, _token:_token},
          success:function(data)
          {
     
          $('#post_data').append(data);
              }
              })
          }
    function toggleDetail(id){

      var eye ="eye"+id;
      var x = document.getElementById(id); 
      var menu=document.getElementsByClassName('secret');
      var menuLength=menu.length;

        if (x.style.display === "none") {
          for (var i=0; i<menuLength;i++){
            menu[i].style.display='none';
            }
            document.getElementById(eye).innerHTML ="&#x274C";
        x.style.display = "flex";
    
        } else {
            x.style.display = "none";
            document.getElementById(eye).innerHTML ="&#xf06e";
          }}
             var url = window.location.pathname;
              var urlId = url.substring(url.lastIndexOf('/') + 1);
      
    
    function sendAjaxRequest(id="", _token)
      {
        $.ajax({
        url:"{{ route('loadmore.load_foods') }}",
        method:"POST",
        data:{id:id, _token:_token, urlId:urlId},
        success:function(data)
        {
        $('#load_more_button').remove();
        $('#post_data').append(data);
        }
        })
        }

    function buttonLoadMore(){
      var id = $(this).data('id');
        $('#load_more_button').html('<b>Loading...</b>');
            sendAjaxRequest(id, _token);
        }

  var after_loading=function(){
  
  _token = $('input[name="_token"]').val();
  
 
  sendAjaxRequest('', _token, urlId);
 
  
 
  $(document).on('click', '#load_more_button', buttonLoadMore);
 
 }
  $(document).ready(after_loading);
 
 </script>   
 @endsection