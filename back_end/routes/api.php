<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IssueController;
use App\Http\Controllers\Api\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/projects/{project}/issues-summary', [ProjectController::class, 'issuesSummary']);
Route::get('/issues', [IssueController::class, 'index']);


// GET /api/projects/1/issues-summary?assigned_to=johndoe
// GET /api/issues?status=open&priority=high&assigned_to=johndoe&project_id=2

