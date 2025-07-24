<?php

namespace App\Models;

use App\Enums\IssueStatus;
use App\Enums\IssuePriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Issue extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'priority',
        'assigned_to'
    ];

    protected $casts = [
        'status' => IssueStatus::class,
        'priority' => IssuePriority::class,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
