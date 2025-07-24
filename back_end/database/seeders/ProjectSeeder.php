<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Project;
use App\Enums\IssueStatus;
use App\Enums\IssuePriority;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = IssueStatus::cases();
        $priorities = IssuePriority::cases();
        $users = ['johndoe', 'janedoe', 'admin', 'alex', 'sara'];

        for ($i = 1; $i <= 5; $i++) {
            $project = Project::create([
                'name' => "Project $i",
                'description' => "Description for project $i",
            ]);

            // إضافة 10 مشكلات لكل مشروع
            for ($j = 1; $j <= 10; $j++) {
                Issue::create([
                    'project_id' => $project->id,
                    'title' => "Issue $j for Project $i",
                    'description' => "This is issue number $j in project $i",
                    'status' => $statuses[array_rand($statuses)],
                    'priority' => $priorities[array_rand($priorities)],
                    'assigned_to' => rand(0, 1) ? $users[array_rand($users)] : null,
                ]);
            }
        }
    }
}
