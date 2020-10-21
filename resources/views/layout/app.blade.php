<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? "QR Tracer" }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
<div id="app">
    @if(!isset($no_nav) || !$no_nav)
        @include('layout.navigation')
    @endif
    <main class="container pt-3" id="app">
        @include('layout.partials.alerts')
        @yield('content')
    </main>
</div>
@yield('scripts')
</body>
</html>
