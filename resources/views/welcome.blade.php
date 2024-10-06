<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do It</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('fontawesome-free-6.6.0-web/css/all.min.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white">
            
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-4 p-6 text-center">
                    @auth
                        <a href="{{ url('/tasks') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Ir a la Lista de Tareas</a>

                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8 flex flex-col gap-36">
                <div class="flex justify-center pt-20">
                    <a href="#" class="block">
                        <img src="{{ asset('logo.webp') }}" alt="Logo" class="h-24 w-full object-cover">
                    </a>
                </div>

                <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                        
                        <a href="http://127.0.0.1:8000/tasks" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250">
                            <div>
                                <div class="flex flex-row items-center gap-5">
                                    <div class="h-16 w-16 bg-blue-50 dark:bg-blue-800/20 flex items-center justify-center rounded-full">
                                        <i class="fa-solid fa-list-check text-blue-500"></i>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">To Do It</h1>
                                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Organizador de Tareas diarias</h2>
                                    </div>
                                </div>

                                <p class="mt-6 text-gray-500 dark:text-gray-400 text-base leading-relaxed">
                                    Gestiona tus tareas desde cualquier lugar.</br >
                                    <b>Crea, edita, elimina y ordena cada tarea de tu lista fácilmente</b>.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-blue-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex justify-center px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-3">
                            <a href="https://portfolio.jesuizdesign.com/" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                                <p>Hecho con ♥ por Jesús Ruiz</p>
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Desarrollado con Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
