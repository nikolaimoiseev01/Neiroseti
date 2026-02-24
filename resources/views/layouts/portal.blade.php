<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="/fixed/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/fixed/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/fixed/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/fixed/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="/fixed/favicon/site.webmanifest" />

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('user', {
                    id: @js(auth()->id()),
                    name: @js(auth()->user()->name),
                    is_full_access: @js(auth()->user()->is_full_access), // любое поле из таблицы users
                })
            })
        </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased flex flex-col min-h-screen">
<x-header/>
{{ $slot }}
<x-footer/>
@stack('page-js')
</body>
</html>
