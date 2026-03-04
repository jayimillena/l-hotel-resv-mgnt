<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'La Roca Hotel Management System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body>
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }} 
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <script>
            document.getElementById('addRoomForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);

                axios.post("{{ route('rooms.store') }}", formData)
                    .then(response => {
                        // Success: Reload page to show new room
                        window.location.reload();
                    })
                    .catch(error => {
                        //
                    });
            });
        </script>
    </body>
</html>