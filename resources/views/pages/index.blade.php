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
   

   <script>
       var _token;
function sendAjaxRequest(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.load_points') }}",
       method:"POST",
       data:{id:id, _token:_token},
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
     console.dir(_token);
    
     sendAjaxRequest('', _token);
    
     
    
     $(document).on('click', '#load_more_button', buttonLoadMore);
    
    }
    $(document).ready(after_loading);
    </script>   
    


    

<hr>

@endsection