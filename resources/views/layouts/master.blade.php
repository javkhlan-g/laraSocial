<html>
<head>
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}"/>
</head>
<body>
@include('templates.header')
<div class="container">
    @yield('content')
</div>
<script src="/js/jquery-1.12.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/src/js/app.js"></script>
</body>
</html>