<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOCIETE GENERALE') }}</title>
	<link rel="icon" type="image/png" href="{{('assets/images/logo.png')}}"/>
    <!-- Login -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/build/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/build/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/animate.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/hamburgers.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/main.css')}}">
    <!--===============================================================================================-->

    <!-- Styles -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
         <!--Login-->
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/build/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/popper.js')}}"></script>
        <script src="{{asset('assets/build/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/build/js/daterangepicker.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/countdowntime.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('assets/build/js/main.js')}}"></script>
</body>
</html>
