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
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('department');
            $table->string('location');
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'internship'])->default('full-time');
            $table->text('overview');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->text('benefits')->nullable();
            $table->string('category'); // audit, tax, advisory, support
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->date('application_deadline')->nullable();
            $table->enum('status', ['active', 'paused', 'closed'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
