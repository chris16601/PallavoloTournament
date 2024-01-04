<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.app')
    
    @section('scripts')
        @parent
    @endsection

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLASSIFICA</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/classifica.css?v=').time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css?v=').time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/popupGironi.css?v=').time()}}">

    <!---->
</head>
<body>
    @livewire('navbar')
    @livewire('classifica-tabella')
    
</body>
</html>