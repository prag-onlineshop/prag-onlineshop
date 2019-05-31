<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
       
    </head>
    <body>
        <div id="app">
        
        <coupon-crud/>

        </div>
    </body>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</html>