<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Event</title>

        @vite(['resources/js/app.js'])
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <nav class="navbar navbar-expand-lg bg-body-text-body-tertiary bg-black p-4">
            <div class="container lg:flex lg:gap-80 sm:flex sm:flex-row sm:gap-0 lg:justify-between">
                <a class="navbar-brand" href="/">
                    <span class="text-4xl text-white font-extrabold w-[25vw]">Event<span class="text-yellow-400">.Mode</span></span>
                </a>    
            </div>
        </nav>
        <div class="absolute">
            <img class="w-[100VW] h-[90vh]" src="{{asset('img/audience-1853662_640.jpg')}}" alt="">
        </div>
        
        
            <div class="">
                <div class="relative top-[500px]">
                    <header class="">
                        @if (Route::has('login'))
                            <nav class=" flex justify-center items-center gap-7 ">
                                @auth
                                <div class="bg-amber-300 rounded-3xl w-[30vh] h-[7vh] pt-2.5 font-bold text-center">
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="text-decoration-none  text-white text-2xl"

                                    >
                                        Dashboard
                                    </a>
                                </div>
                                    
                                @else
                                <div class="bg-amber-300 rounded-3xl w-[30vh] h-[7vh] pt-2.5 font-bold text-center ">
                                    <a
                                        href="{{ route('login') }}"
                                        class="text-decoration-none  text-white text-2xl"
                                    >
                                        Log in
                                    </a>
                                </div>
                                    @if (Route::has('register'))
                                    <div class="border-2 rounded-3xl w-[20vh] h-[7vh] pt-2.5 font-bold text-center ">
                                        <a
                                            href="{{ route('register') }}"
                                            class="text-decoration-none  text-white text-2xl"                                        >
                                            Register
                                        </a>
                                    </div>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
                </div>
                
            </div>
        
        

    </body>
</html>
