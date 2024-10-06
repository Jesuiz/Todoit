<x-app-layout>
    <x-slot name="header">
        @if(Auth::check())
            <div class="flex flex-row items-left">
                <h2 class="font-medium text-sm text-gray-800 dark:text-gray-200">
                    ¡Bienvenido {{ Auth::user()->name }}!👋
                </h2>
                <p class="font-medium text-sm text-gray-800 dark:text-gray-200">
                   ,  gracias por usar nuestra aplicación ❤
                </p>
            </div>
        @else
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                ¡Hola {{ __('Invitado') }}!, gracias por usar nuestra aplicación.
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Lista de Tareas") }} 📋</h3>

                    <!-- Formulario para crear una nueva tarea -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4 flex">
                        @csrf
                        <input type="text" name="title" class="text-gray-500 dark:text-gray-700 border rounded-l-lg p-4 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Escribe aquí la tarea que necesitas realizar" required>
                            <button type="submit" class="font-bold text-white w-1/6 py-1 rounded-r-lg bg-blue-500 shadow-lg hover:bg-blue-600">
                                Crear Tarea
                            </button>
                    </form>

                    <!-- Listado de tareas -->
                    <ul class="space-y-4 mt-10">
                        @foreach($tasks as $task)
                            <li class="flex justify-between items-center bg-gray-100 dark:bg-white p-4 rounded-lg shadow">
                                <div class="flex flex-row justify-between items-center">
                                    @if($task->completed)
                                        <span class="flex items-center text-sm font-medium text-white dark:bg-blue-600 p-1.5 px-3 rounded-full">
                                            <i class="fa-solid fa-star mr-1.5"></i></i>Completada
                                        </span>
                                    @else
                                        <span class="flex items-center text-sm font-medium text-white dark:bg-orange-500 p-1.5 px-3 rounded-full">
                                            <i class="fa-solid fa-hourglass-half mr-1.5"></i>Pendiente
                                        </span>
                                    @endif

                                    @if($task->completed)
                                        <div class="flex flex-col mx-3">
                                            <span class="text-base font-bold text-gray-500 dark:text-gray-700 uppercase">{{ $task->title }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-500">Creada: {{ $task->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    @elseif($task->pending)
                                        <div class="flex flex-col mx-3">
                                            <span class="text-base font-bold text-gray-500 dark:text-gray-700 uppercase">{{ $task->title }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-500">Creada: {{ $task->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    @else
                                        <div class="flex flex-col mx-3">
                                            <span class="{{ $task->completed ? 'text-xs text-gray-500 dark:text-gray-700' : 'text-base font-bold text-gray-500 dark:text-gray-700 uppercase' }}">{{ $task->title }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-500">Creada: {{ $task->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex items-center">
                                    @if($task->completed)
                                    @else
                                        <form action="{{ route('tasks.update', $task) }}" method="POST" class="mr-3">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="flex items-center text-sm font-medium text-white dark:bg-green-600 p-1.5 px-3 rounded-full hover:bg-green-900 hover:scale-105 ease-in-out duration-300">
                                                <i class="fa-solid fa-circle-check mr-1.5"></i> Completar
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center text-sm font-medium text-white dark:bg-red-600 p-1.5 px-3 rounded-full hover:bg-red-900 hover:scale-105 ease-in-out duration-300">
                                            <i class="fa-solid fa-trash mr-1.5"></i> Borrar
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
