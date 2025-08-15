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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Contact Information');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->json('social_media_links')->nullable(); // Store as JSON for multiple social media links
            $table->text('map_embed_url')->nullable();
            $table->string('google_maps_link')->nullable();
            $table->json('business_hours')->nullable(); // Store as JSON for flexible hours
            $table->text('additional_info')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information');
    }
};
