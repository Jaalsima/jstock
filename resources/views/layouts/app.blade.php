<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    {{-- <style>
        #contentEval {
            overflow-y: scroll;
            scroll-margin: 20px;
        }

        #contentEval::-webkit-scrollbar {
            background: none;
            width: 10px;
            right: 10px;
        }

        #contentEval::-webkit-scrollbar-thumb {
            background: #c32323;
            border-radius: 10px;
        }

        #contentEval::-webkit-scrollbar-track-piece {
            margin: 20px 0;
        }
    </style> --}}
</head>

<body class="font-serif antialiased">
    <x-banner />

    <div class="h-screen overflow-hidden bg-gray-100 dark:bg-gray-700">
        <livewire:navigation-menu />

        <div class="flex dark:bg-gray-700 " style="height: 93vh;">
            <x-sidebar />
            @if (isset($header))
                <header class="bg-white shadow-md dark:bg-gray-800 shadow-gray-400 dark:shadow-gray-600">
                    <div class="px-4 py-6">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="p-4 overflow-auto lg:w-full dark:bg-gray-500">
                {{ $slot }}
            </main>

        </div>
    </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.22/dist/sweetalert2.all.min.js"></script>
    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Excelente!',
                message,
                'success'
            );
        });
    </script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
