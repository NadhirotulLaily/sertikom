<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Application')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div id="sidebar-wrapper">
        @include('layouts.sidebar')
    </div>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    @stack('scripts')
</body>
</html>
