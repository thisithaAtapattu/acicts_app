<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'activity_id')->constrained('activities');
            $table->tinyInteger('from_grade');
            $table->tinyInteger('to_grade');
            $table->foreignId('teacher_id')->constrained(table: 'teachers');
            $table->foreignId('school_id')->constrained('schools')->onDelete("cascade");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurriculars');
    }
};
