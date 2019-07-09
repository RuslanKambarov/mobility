<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/libs/jquery/jquery-1.11.2.min.js') }}" defer></script>
    <script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}" defer></script>
    
    
    <!-- Fonts -->
    <link href="{{ asset('http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900') }}">

    <!-- Styles -->
        
    <link href="{{ asset('css/theme-default/bootstrap.css?1422792965') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/materialadmin.css?1425466319') }}" rel="stylesheet">    
    <link href="{{ asset('css/theme-default/font-awesome.min.css?1422529194') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-default/material-design-iconic-font.min.css?1421434286') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
</head>
<body>
    
    <main class="container h-100">
        @yield('content')
    </main>
    
</body>
</html>
