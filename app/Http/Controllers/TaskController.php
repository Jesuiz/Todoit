<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{


    public function index(Request $request)
    {
        $filters = $request->only(['title', 'completed', 'created_at']);
        
        // Asegurarse de que 'completed' sea un booleano
        if (isset($filters['completed'])) {
            $filters['completed'] = $request->boolean('completed');
        }

        $tasks = Task::filter($filters)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Log para depuración
        Log::info('Filtros aplicados:', $filters);
        Log::info('Número de tareas encontradas: ' . $tasks->count());

        return view('tasks.index', compact('tasks'));
    }


    

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        auth()->user()->tasks()->create([
            'title' => $request->title,
        ]);
        return redirect()->route('tasks.index');
    }

    public function update(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
