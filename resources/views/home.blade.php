<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class=" min-h-screen bg-dots-darker bg-center bg-gray-200 dark:bg-dots-lighter dark:bg-gray-700 selection:bg-indigo-500 selection:text-white">
        @if (Route::has('login'))
            <div class="text-2xl sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-whitefocus:bg-gray-50 hover:bg-gray-200 hover:rounded hover:p-1">Inicio</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-whitefocus:bg-gray-50 hover:bg-gray-200 hover:rounded hover:p-1">Ingresar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 mr-4 text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-whitefocus:bg-gray-50 hover:bg-gray-200 hover:rounded hover:p-1">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="mx-auto p-6 lg:p-8">

            <a href="{{ route('home') }}" class="flex justify-center">
                <img class="mt-10 rounded-full shadow-xl dark:shadow-gray-400" width="150"
                    src="{{ asset('images/jstock.png') }}" alt="Logo JStock">

            </a>

            <div class="mt-10">

                <x-welcome-title />
                <x-my-welcome />
            </div>

            <div>
                <x-my-footer>
                </x-my-footer>
            </div>


        </div>
    </div>
</body>

</html>
