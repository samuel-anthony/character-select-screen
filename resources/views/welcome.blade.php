<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <style>
          .my-flex-container{
            border: 2px solid green;
            background: black;
          }
          .my-flex-item{
            border: 2px solid grey;
          }
        </style>
    </head>
    <body >
      <button type="button" name="button" onclick="resetDatabase()">resetDatabase</button>
      <a href="/characterSelect"><button type="button" name="button" onclick="characterSelect()">characterSelect</button></a>

      <script type="text/javascript">
        function resetDatabase(){
          $.ajax({
            url:'/reset'
          });
        }
      </script>
    </body>
</html>
