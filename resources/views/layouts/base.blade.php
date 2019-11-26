<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="author" content="Gonzalo Soto">
    <title>{{getenv('APP_NAME')}} - @yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body data-page-id="@yield('data-page-id')">
<article class="grid-container">
    <div class="grid-x align-center">
        <div class="cell medium-12 main-wrapper">
            @yield('body')
            <script src="/js/all.js"></script>
        </div>
    </div>
</article>
@yield('stripe-checkout')
</body>
</html>