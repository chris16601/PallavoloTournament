<!DOCTYPE html>
<html lang="it">
<head>

    @extends('layouts.app')
    
    @section('scripts')
        @parent
    @endsection

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css?v=').time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/popupGironi.css?v=').time()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/log.css?v=').time()}}">
    <!---->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log</title>
</head>
<body>
    @livewire('navbar')
    @livewire('logtable')
</body>
</html>