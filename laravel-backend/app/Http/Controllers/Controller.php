<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Create task for a project
     * POST /api/projects/{projectId}/tasks
     */
    public function store(Request $request, $projectId)
    {
        // check project exists
        Project::findOrFail($projectId);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'nullable|in:pending,in_progress,completed',
        ]);

        $task = Task::create([
            'project_id'  => $projectId,
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
     * Get tasks by project
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
        $task->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
        ]);
    }
}
