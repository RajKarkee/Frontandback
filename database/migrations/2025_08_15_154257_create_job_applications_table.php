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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_opening_id')->nullable()->constrained()->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('cover_letter')->nullable();
            $table->string('resume_path');
            $table->string('portfolio_url')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->date('available_start_date')->nullable();
            $table->enum('status', ['pending', 'under_review', 'shortlisted', 'interviewed', 'offered', 'hired', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->json('additional_info')->nullable(); // For any extra form fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
