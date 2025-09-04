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
        Schema::create('navigation_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique(); // home, services, industries, etc.
            $table->string('page_title');
            $table->string('route_name');
            $table->string('icon_class')->default('fas fa-home');
            $table->text('description')->nullable();
            $table->string('preview_image')->nullable(); // URL or path to image
            $table->string('tags')->nullable(); // Comma-separated tags
            $table->json('metadata')->nullable(); // Additional data like services, etc.
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_settings');
    }
};
