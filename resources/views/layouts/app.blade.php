<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
<body class="sb-nav-fixed">
    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>
