<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --------------------
// Public routes
// --------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// --------------------
// Protected routes (Sanctum)
// --------------------
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // --------------------
    // Projects
    // --------------------
    Route::post('/projects', [ProjectController::class, 'store']); // create project
    Route::get('/projects', [ProjectController::class, 'index']);  // list projects

    // --------------------
    // Tasks ✅ IMPORTANT
    // --------------------

    // ✅ CREATE TASK (THIS WAS MISSING)
    // POST /api/projects/{projectId}/tasks
    Route::post('/projects/{projectId}/tasks', [TaskController::class, 'store']);

    // ✅ LIST TASKS
    // GET /api/projects/{projectId}/tasks
    Route::get('/projects/{projectId}/tasks', [TaskController::class, 'index']);

    // ✅ UPDATE TASK STATUS
    // PUT /api/tasks/{id}
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
});
