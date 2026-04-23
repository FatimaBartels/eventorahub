<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'EventoraHub') }} — @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@500&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body bg-background text-text-dark min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm">

        {{-- Brand --}}
        <div class="flex flex-col items-center gap-2 mb-8">
    <div class="w-11 h-11 rounded-[11px] bg-indigo-50 flex items-center justify-center">
        <svg class="w-[22px] h-[22px]" fill="none" viewBox="0 0 24 24" stroke="#4F46E5" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
        </svg>
    </div>
    <p class="font-heading text-[17px] tracking-tight">
        <span class="text-primary">E</span>ventoraHub
    </p>
</div>

        {{-- Card --}}
        <div class="bg-white border border-gray-100 rounded-xl p-8">
            @yield('content')
        </div>

        {{-- Footer link --}}
        @hasSection('footer')
            <p class="text-xs text-gray-400 text-center mt-4">
                @yield('footer')
            </p>
        @endif

    </div>

</body>
</html>