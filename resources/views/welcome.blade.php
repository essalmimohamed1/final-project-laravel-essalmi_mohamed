<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event</title>

    <!-- Load CSS and JS via Vite -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-900">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-black p-6 fixed w-full z-50">
        <div class="container flex justify-between items-center">
            <a class="navbar-brand text-4xl font-extrabold text-white" href="/">
                Event<span class="text-yellow-400">.Mode</span>
            </a>
        </div>
    </nav>

    <!-- Full-Page Background Image with Gradient Overlay -->
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('{{asset('img/audience-1853662_640.jpg')}}');">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/90"></div>

        <!-- Centered Content -->
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center">
            <h1 class="text-white text-6xl font-extrabold mb-8">Welcome to Event.Mode</h1>
            <p class="text-gray-300 text-xl mb-12">Your ultimate platform to create and manage unforgettable events.</p>

            <!-- Auth Navigation -->
            <div class="flex gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-xl font-bold hover:bg-yellow-500 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-xl font-bold hover:bg-yellow-500 transition">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="border-2 border-yellow-400 text-white px-8 py-4 rounded-full text-xl font-bold hover:bg-yellow-400 hover:text-gray-900 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

</body>
</html>
