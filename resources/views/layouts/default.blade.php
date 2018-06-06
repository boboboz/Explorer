<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Sample App') - Laravel 入门教程</title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/my.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script language="JavaScript" src="/js/bootstrap.js"></script>
        <script language="JavaScript" src="/js/app.js"></script>
        <!-- <link rel="stylesheet" href="css/bootstrap-grid.css"> -->
        <!-- <link rel="stylesheet" href="css/bootstrap-reboot.css"> -->
    </head>
    <body>
        @include('layouts._header')

        <div class="container">
            <div class="col-md-offset-1 col-md-10">
                @include('shared._messages')
                @yield('content')
                @include('layouts._footer')
            </div>
        </div>
    </body>
</html>
