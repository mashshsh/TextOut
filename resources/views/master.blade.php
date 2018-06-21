<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LaravelSample - 出席管理</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- *1 -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"> <!-- *2 -->
</head>
 
<body>
<header class="global-header">
    <section class="header-text">
        <h1><a href="{{ route('home') }}">出席管理</a></h1> <!-- *3 -->
 
        <div class="tag-line">出席とるよ！！</div>
    </section>
</header>
 
<main id="app" class="container">
    @yield('content')
</main>
 
<script src="{{ mix('js/app.js') }}"></script> <!-- *2 -->
</body>
 
</html>
