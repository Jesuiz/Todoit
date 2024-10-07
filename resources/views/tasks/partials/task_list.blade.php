
<ul class="space-y-4 mt-10">
    @foreach($tasks as $task)
        <li class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-100 dark:bg-white p-4 rounded-lg shadow">
            <div class="flex flex-col sm:flex-row items-start sm:items-center w-full">
                @if($task->completed)
                    <span class="flex items-center text-sm font-medium text-white dark:bg-blue-600 p-1.5 px-3 rounded-full mb-2 sm:mb-0">
                        <i class="fa-solid fa-star mr-1.5"></i>Completada
                    </span>
                @else
                    <span class="flex items-center text-sm font-medium text-white dark:bg-orange-500 p-1.5 px-3 rounded-full mb-2 sm:mb-0">
                        <i class="fa-solid fa-hourglass-half mr-1.5"></i>Pendiente
                    </span>
                @endif

                <div class="flex flex-col px-2 w-full max-w-full">
                    <span class="font-semibold text-gray-700 uppercase break-words sm:whitespace-normal">
                        {{ $task->title }}
                    </span>
                    <span class="text-xs text-gray-500 dark:text-gray-500">
                        Creada: {{ $task->created_at->format('d/m/Y') }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center sm:space-x-3 mt-3 sm:mt-0">
                @if(!$task->completed)
                    <form action="{{ route('tasks.update', $task) }}" method="POST" class="mb-2 sm:mb-0">
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
