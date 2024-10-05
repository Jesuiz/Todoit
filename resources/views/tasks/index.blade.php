@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="bg-red-500 text-white p-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Mis Tareas</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" required class="border rounded" placeholder="Nueva tarea">
        <button type="submit" class="bg-blue-500 text-white rounded">Agregar</button>
    </form>

    <ul>
        @foreach($tasks as $task)
        <li class="{{ $task->completed ? 'line-through' : '' }}">
            {{ $task->title }}
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit">{{ $task->completed ? 'Desmarcar' : 'Completar' }}</button>
            </form>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Eliminar</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection
