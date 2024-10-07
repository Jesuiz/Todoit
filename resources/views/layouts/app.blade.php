<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'To Do It') }}</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('fontawesome-free-6.6.0-web/css/all.min.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            function applyFilter() {
                const form = document.getElementById('filter-form');
                const formData = new FormData(form);
                const queryString = new URLSearchParams(formData).toString();

                fetch(`{{ route('tasks.index') }}?${queryString}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('task-list').innerHTML = html;
                    })
                    .catch(error => console.error('Error al filtrar las tareas:', error));
            }
        </script>

    </body>
</html>
