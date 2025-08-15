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
        Schema::create('about_core_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_id')->constrained('abouts')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('icon_svg')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_core_values');
    }
};
