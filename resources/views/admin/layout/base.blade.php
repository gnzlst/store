<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="author" content="Gonzalo Soto">
    <title>{{getenv('APP_NAME')}} - @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"/>
</head>
<body data-page-id="@yield('data-page-id')">
<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas>
    @include('includes.admin-sidebar')
</div>
<div class="off-canvas-content admin-title-bar" data-off-canvas-content>
    <div id="container">
        <header id="header" class="header">
        </header>
        <div id="header">
            @include('includes.admin-header')
        </div>
        <div id="body">
            @yield('content')
        </div>
        <div id="footer">
            @include('includes.admin-footer')
        </div>
    </div>
</div>
<script src="/js/all.js"></script>
</body>
</html>