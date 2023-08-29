<!DOCTYPE html>
<html lang="en">

<head>
@include('superadmin.includes.head')
<title> @yield('title')</title>

</head>
<body>
      @include('superadmin.includes.nav')
      @yield('content')
</body>

</html>