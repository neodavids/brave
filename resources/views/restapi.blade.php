<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome To Laravel App Builder Family</title>
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>
<body style="background:#f8fafc">

  <div id="app">
    <app></app>
  </div>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
