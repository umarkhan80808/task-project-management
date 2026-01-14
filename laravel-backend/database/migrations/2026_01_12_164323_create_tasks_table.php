<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->enum('status', ['TODO', 'WIP', 'DONE', 'OVERDUE'])->default('TODO');
            $table->enum('priority', ['LOW', 'MEDIUM', 'HIGH'])->default('LOW');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
