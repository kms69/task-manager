<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Other CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
@livewireScripts
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Other JS files -->
</body>
</html>
