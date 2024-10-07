<x-app-layout>
    <x-slot name="header">
        @if(Auth::check())
            <div class="flex flex-row items-left">
                <h2 class="font-medium text-sm text-gray-800 dark:text-gray-200">
                    ¡Bienvenido {{ Auth::user()->name }}!👋,  gracias por usar nuestra aplicación ❤
                </h2>
            </div>
        @else
            <h2 class="font-medium text-xl text-gray-800 dark:text-gray-200 leading-tight">
                ¡Hola {{ __('Invitado') }}!, gracias por usar nuestra aplicación.
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-4">{{ __("Lista de Tareas") }} 📋</h3>
                    
                    <!-- Formulario para crear una nueva tarea -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4 flex flex-col sm:flex-row">
                        @csrf
                        <input type="text" name="title" maxlength="80" class="text-gray-500 dark:text-gray-700 border rounded-l-lg sm:rounded-l-lg p-4 w-full sm:w-5/6 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4 sm:mb-0" placeholder="Escribe aquí la tarea que necesitas realizar" required>
                        <button type="submit" class="font-semibold text-white w-full sm:w-1/6 py-3 sm:py-1 rounded-r-lg sm:rounded-r-lg bg-blue-500 shadow-lg hover:bg-blue-600">
                            Crear Tarea
                        </button>
                    </form>

                    <!-- Formulario para filtrar las tareas -->
                    <form action="{{ route('tasks.index') }}" method="GET" class="mb-4 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="flex flex-col md:flex-row md:items-end md:space-x-4">
                            <div class="mb-4 md:mb-0 flex-grow">
                                <label for="title" class="block text-sm font-medium text-white mb-1">Título</label>
                                <input type="text" name="title" id="title" value="{{ request('title') }}" class="w-full text-gray-500 dark:text-gray-700 rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/4">
                                <label for="completed" class="block text-sm font-medium text-white mb-1">Estado</label>
                                <select name="completed" id="completed" class="text-gray-500 dark:text-gray-700 w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="" ></option>
                                    <option value="1" {{ request('completed') == '1' ? 'selected' : '' }}>Completadas</option>
                                    <option value="0" {{ request('completed') == '0' ? 'selected' : '' }}>Pendientes</option>
                                </select>
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/4">
                                <label for="created_at" class="block text-sm font-medium text-white mb-1">Fecha de creación</label>
                                <input type="date" name="created_at" id="created_at" value="{{ request('created_at') }}" class="w-full text-gray-500 dark:text-gray-700 rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="flex space-x-2">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                                    Filtrar
                                </button>
                                <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-800 text-white font-medium py-2 px-4 rounded">
                                    Limpiar
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Lista de tareas -->
                    <div id="task-list">
                        @include('tasks.partials.task_list', ['tasks' => $tasks])
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
