<!DOCTYPE html>
<html lang="en">
<head>
    @include('teacher.includes.head')
    <title>@yield('title')</title>
</head>
<body>
@include('teacher.includes.nav')
@yield('content')
</body>
</html>