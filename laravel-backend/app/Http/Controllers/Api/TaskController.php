<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Create a new task
     * POST /api/tasks
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'nullable|in:pending,in_progress,completed',
        ]);

        $task = Task::create([
            'project_id'  => $request->project_id,
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status ?? 'pending',
        ]);

        return response()->json([
            'message' => 'Task created successfully',
            'task'    => $task,
        ], 201);
    }

    /**
     * List tasks by project
     * GET /api/projects/{projectId}/tasks
     */
    public function index($projectId)
    {
        $tasks = Task::where('project_id', $projectId)->get();

        return response()->json($tasks);
    }

    /**
     * Update task status
     * PUT /api/tasks/{id}
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();

        return response()->json([
            'message' => 'Task updated successfully',
            'task'    => $task,
        ]);
    }
}
