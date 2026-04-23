<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EventoraHub') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-text-dark">

    <!--Navbar-->
    <x-public.navbar />

<main>
    @yield('content')
</main>
   <!--Footer-->
    <x-public.footer />
</body>
</html>