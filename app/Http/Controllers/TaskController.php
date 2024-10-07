<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{


    public function index(Request $request)
    {
        $filters = $request->only(['title', 'completed', 'created_at']);
        
        if (isset($filters['completed'])) {
            $filters['completed'] = $request->boolean('completed');
        }

        $tasks = Auth::user()->tasks()->filter($filters)
            ->orderBy('created_at', 'desc')
            ->get();

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
