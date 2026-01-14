<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 🔹 Create Project
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'admin_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project
        ], 201);
    }

    // 🔹 List Projects
    public function index()
    {
        $projects = Project::latest()->get();

        return response()->json($projects);
    }
}
