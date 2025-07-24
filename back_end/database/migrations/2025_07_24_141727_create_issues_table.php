<?php

use App\Enums\IssueStatus;
use App\Enums\IssuePriority;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', array_column(IssueStatus::cases(), 'value'))->default(IssueStatus::OPEN->value);
            $table->enum('priority', array_column(IssuePriority::cases(), 'value'))->default(IssuePriority::MEDIUM->value);
            $table->string('assigned_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
