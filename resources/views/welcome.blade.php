<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
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
        <div class="container flex-wrap my-flex-container mt-5">
            <div class="d-flex flex-row justify-content-between">
              <div class="my-flex-itemd d-flex flex-column-reverse">
                <img src="{{ URL::to('/storage/fotoAldo.jpg') }}" width="300px" alt="">
              </div>
              <div class="my-flex-item my-flex-itemd d-flex flex-column justify-content-center">
                <img src="{{ URL::to('/storage/vs.png') }}" width="100px" alt="">
              </div>
              <div class="my-flex-item">
                <img src="{{ URL::to('/storage/fotoAldo.jpg') }}" width="300px" alt="">
              </div>
            </div>

            <div class="d-flex flex-row justify-content-center">

            </div>
        </div>
    </body>
</html>
