<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vector') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #footer {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
        }

    </style>
</head>

<body class="overflow-hidden">
    <div id="app" class="d-flex flex-column">
        <main class="form-row d-flex justify-content-center">
            @yield('content')
        </main>
        <footer class="footer d-flex align-items-end">
            <div id="footer" class="container text-center">
                <h6 style="letter-spacing: 3pt;" class="text-secondary text-monospace">Comunicación Interna · 2021
                    &copy; Aguila Ammunition</h6>
            </div>
        </footer>
    </div>
</body>

</html>
