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
        Schema::table('jumbotrons', function (Blueprint $table) {
            // Remove unique constraint from page_slug to allow multiple slides per page
            $table->dropUnique(['page_slug']);

            // Add new fields for slide functionality
            $table->string('button_text')->nullable()->after('subtitle');
            $table->string('button_link')->nullable()->after('button_text');
            $table->boolean('is_multi_slide')->default(false)->after('button_link');
            $table->integer('slide_order')->default(1)->after('is_multi_slide');

            // Add composite index for page_slug and slide_order
            $table->index(['page_slug', 'slide_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jumbotrons', function (Blueprint $table) {
            // Drop the composite index
            $table->dropIndex(['page_slug', 'slide_order']);

            // Remove the new fields
            $table->dropColumn(['button_text', 'button_link', 'is_multi_slide', 'slide_order']);

            // Re-add unique constraint to page_slug
            $table->unique('page_slug');
        });
    }
};
