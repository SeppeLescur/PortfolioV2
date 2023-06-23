<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite("resources/css/app.css")
    <title>@yield('title')</title>
</head>
<body>
    @include('layout.header')
    <div id="content">
        @yield('content')
    </div>
    @include('layout.footer')
</body>
</html>