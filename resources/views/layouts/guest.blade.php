<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:flex-row gap-14 sm:justify-center items-center pt-6 sm:pt-0 bg-slate-950">
        <div class="sm:relative">
            <img class="w-full sm:w-[50vw]" src="{{asset("img/illustration-people-login.png")}}" alt="">
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-amber-400 shadow-md sm:rounded-lg">
            <div class="absolute left-10 top-[20px] sm:left-auto sm:right-10 top-10">
                <a class="navbar-brand" href="/">
                    <span class="text-4xl text-white font-extrabold w-[25vw]">Event<span class="text-yellow-400">.Mode</span></span>
                </a>  
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
