<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            {{-- Sección de Tareas --}}
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">{{ __('Your Tasks') }}</h3>

                    {{-- Formulario para agregar nuevas tareas --}}
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="flex">
                            <input type="text" name="title" required 
                                   class="border rounded-l px-4 py-2 w-full" 
                                   placeholder="New task">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">
                                {{ __('Add Task') }}
                            </button>
                        </div>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </form>

                    {{-- Lista de tareas --}}
                    <ul class="divide-y divide-gray-200">
                        @foreach($tasks as $task)
                            <li class="py-2 flex items-center justify-between {{ $task->completed ? 'line-through' : '' }}">
                                <span>{{ $task->title }}</span>

                                <div class="flex items-center space-x-2">
                                    {{-- Marcar como completada --}}
                                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-sm text-green-500">
                                            {{ $task->completed ? __('Unmark') : __('Complete') }}
                                        </button>
                                    </form>

                                    {{-- Eliminar tarea --}}
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-500">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Si no hay tareas --}}
                    @if($tasks->isEmpty())
                        <p class="text-sm text-gray-500 mt-4">{{ __('You have no tasks yet.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
