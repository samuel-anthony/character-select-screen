<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <style>

          @import url('https://fonts.googleapis.com/css?family=Bangers&display=swap');
          .my-flex-container{
            border: 2px solid green;
            background: black;
          }
          .my-flex-item{
            position: relative;
            border: 2px solid grey;
          }
          .user-name{
            font-family: Bangers;
            font-size: 50px;
            text-shadow: 0 0 3px #FFFFFF, 0 0 5px #FFFFFF;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
          }

          .memek {
            background-color: red;
          }
        </style>
    </head>
    <body >
        <div class="container flex-wrap my-flex-container">
            <div class="d-flex flex-row justify-content-between">
              <div class="my-flex-item" id="p1Gen">
                <img src="/storage/big/{{$allUser[0]->profileImage}}.jpg" width="300px" alt="" id="p1Pic">
                <div class="user-name" id="p1Name">
                  {{$allUser[0]->name}}
                </div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <img src="{{ URL::to('/storage/vs.png') }}" width="200px" alt="">
              </div>
              <div class="my-flex-item" id="p2Gen">
                <img src="/storage/big/{{$allUser[0]->profileImage}}.jpg" width="300px" alt="" id="p2Pic">
                <div class="user-name" id="p2Name">
                  {{$allUser[0]->name}}
                </div>
              </div>
            </div>

            @for ($counter = 0; $counter < count($allUser); $counter++)
              @if($counter%10==0)
                <div class="d-flex flex-row justify-content-center">
              @endif
                <div id="{{$counter+1}}" class="p-1">
                  <img src="/storage/small/{{$allUser[$counter]->profileImage}}.jpg" width="90px" alt="">
                </div>
              @if(($counter+1)%10==0||($counter+1)==count($allUser))
                </div>
              @endif
            @endfor
        </div>
    </body>
</html>
