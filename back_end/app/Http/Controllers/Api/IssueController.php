<?php

namespace App\Http\Controllers\Api;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    public function index(Request $request)
    {
        $query = Issue::with('project');

        // تطبيق الفلاتر
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }

        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        // ترتيب: حسب الأولوية ثم التاريخ تنازلي
        $query->orderByRaw("
            FIELD(priority, 'high', 'medium', 'low')
        ")->latest();

        return response()->json(
            $query->paginate(10)->through(function ($issue) {
                return [
                    'id' => $issue->id,
                    'title' => $issue->title,
                    'project_name' => $issue->project->name,
                    'status' => $issue->status,
                    'priority' => $issue->priority,
                    'assigned_to' => $issue->assigned_to ?? 'Unassigned',
                    'created_at' => $issue->created_at->toDateTimeString(),
                ];
            })
        );
    }
}
