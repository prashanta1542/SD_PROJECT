<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('includes.head')
    <title> @yield('title')</title>
</head>
<body>
    @include('nav')
    @yield('content')
    <!-- @include('footer') -->
</body>
</html>