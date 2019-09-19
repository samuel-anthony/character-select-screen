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
        @font-face {
            font-family: myFirstFont;
            src: url(/storage/njnaruto.ttf);
        }

        .my-flex-container {
            border: 2px solid green;
            background: black;
        }

        .my-flex-item {
            border: 2px solid grey;
        }

        body {
            background: url('/storage/bg1.png') no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            font-family: myFirstFont;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 500px;">
        <div class="row justify-content-center mt-5">
            <a href="/characterSelect"><button type="button" class="btn btn-light btn-lg py-3 px-5" name="button"
                    onclick="characterSelect()">Character Select</button></a>
        </div>
        <div class="row justify-content-center mt-4">
            <button type="button" class="btn btn-light btn-lg py-3 px-5" name="button"
                onclick="resetDatabase()">Reset</button>
        </div>
        <script type="text/javascript">
            function resetDatabase() {
                $.ajax({
                    url: '/reset'
                });
            }

        </script>
    </div>
</body>

</html>
