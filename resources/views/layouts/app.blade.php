<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Etterem</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- Styles -->
        <style>
            
        </style>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        
        </script>
        

<script>
    $(document).ready(function(){
     
     var _token = $('input[name="_token"]').val();
    
     load_data('', _token);
    
     function load_data(id="", _token)
     {
      $.ajax({
       url:"{{ route('loadmore.load_data') }}",
       method:"POST",
       data:{id:id, _token:_token},
       success:function(data)
       {
        $('#load_more_button').remove();
        $('#post_data').append(data);
       }
      })
     }
    
     $(document).on('click', '#load_more_button', function(){
      var id = $(this).data('id');
      $('#load_more_button').html('<b>Loading...</b>');
      load_data(id, _token);
     });
    
    });
    </script>


    </head>
    <body>
        @yield('content')
    </body>
</html>