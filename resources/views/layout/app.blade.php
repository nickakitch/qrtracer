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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZQLZ4FS2L9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-ZQLZ4FS2L9');
    </script>

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
    @include('layout.partials.footer')
</div>
@yield('scripts')
</body>
</html>
