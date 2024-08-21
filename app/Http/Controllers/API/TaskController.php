<?php

namespace App\Http\Controllers\API;

use App\Events\TaskUpdated;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in-progress,completed',
        ]);

        $task = Task::create($validatedData);
        Log::info('Task created via API: ', ['task' => $task]);

        TaskUpdated::dispatch($task);

        Log::info('TaskUpdated event dispatched: ', ['task' => $task]);

        return response()->json($task, 201);
    }




    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'sometimes|required|date',
            'priority' => 'sometimes|required|in:low,medium,high',
            'status' => 'sometimes|required|in:pending,in-progress,completed',
        ]);

        $task->update($validatedData);
        return response()->json($task, 200);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'Task has been successfully deleted.'
        ], 200);
    }
}
