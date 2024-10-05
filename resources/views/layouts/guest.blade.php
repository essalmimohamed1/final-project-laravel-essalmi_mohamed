<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Event.mode</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Style -->
    <style>
        body {
            background-color: #000000; /* Black background */
        }
        .form-container {
            background-color: #1a1a1a; /* Darker shade of black */
            color: #ffffff; /* White text */
            padding: 2rem;
            border-radius: 1rem;
        }
        .btn-yellow {
            background-color: #fbbf24; /* Yellow button */
            color: #000000; /* Black text */
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-yellow:hover {
            background-color: #f59e0b; /* Darker yellow on hover */
        }
        .form-heading {
            color: #fbbf24; /* Yellow heading */
        }
        .input-field {
            background-color: #2a2a2a; /* Dark input background */
            color: #ffffff; /* White input text */
            border: 1px solid #fbbf24; /* Yellow border */
        }
        .login-image {
            width: 450px; /* Adjust width */
            height: auto;
            max-height: 60vh; /* Adjust max height */
        }
        .logo-overlay {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col lg:flex-row items-center justify-center gap-10 lg:gap-20 bg-black relative">

        <!-- Logo Overlayed on the Image -->
        <div class="logo-overlay">
            <a href="/" class="text-4xl font-extrabold text-white">
                Event<span class="text-yellow-500">.Mode</span>
            </a>
        </div>

        <!-- Image (now with adjusted size and position) -->
        <div class="hidden lg:block lg:order-1 order-2">
            <img src="{{ asset('img/illustration-people-login.png') }}" alt="Login Illustration" class="login-image">
        </div>

        <!-- Login Form Container -->
        <div class="w-full lg:w-[450px] px-6 py-12 form-container shadow-lg z-10 lg:order-2 order-1">
            <div class="mt-16">
                <h2 class="text-3xl font-bold form-heading mb-6 text-center">Sign In to Your Account</h2>

                <!-- Session Status -->
                {{ $slot }}
            </div>
        </div>

    </div>
</body>
</html>
