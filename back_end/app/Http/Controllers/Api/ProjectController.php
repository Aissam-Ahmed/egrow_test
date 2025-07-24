<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function issuesSummary(Project $project, Request $request)
    {
        $assignedTo = $request->query('assigned_to');

        $total = $project->issues()->count();
        $open = $project->issues()->where('status', 'open')->count();

        $assignedToCount = $assignedTo
            ? $project->issues()->where('assigned_to', $assignedTo)->count()
            : 0;

        $highPriorityUnresolved = $project->issues()
            ->where('priority', 'high')
            ->where('status', '!=', 'closed')
            ->count();

        return response()->json([
            'status' => 'success',
            'data' => [
                'project' => $project->name,
                'total_issues' => $total,
                'open_issues' => $open,
                'assigned_to_issues' => $assignedToCount,
                'high_priority_unresolved' => $highPriorityUnresolved,
            ]
        ]);
    }
}
