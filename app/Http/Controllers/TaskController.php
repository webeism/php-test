<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:5000',
        ]);

        $validated['edit_token'] = Str::uuid();
        $task = Task::create($validated);

        return response()->json([
            'task' => $task,
            'edit_url' => url("/api/tasks/{$task->id}/{$task->edit_token}")
        ], 201);
    }
}
