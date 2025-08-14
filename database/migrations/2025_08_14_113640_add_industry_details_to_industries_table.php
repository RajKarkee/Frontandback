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
        Schema::table('industries', function (Blueprint $table) {
            $table->string('title')->nullable()->after('name'); // For display title (different from name)
            $table->json('features')->nullable()->after('description'); // For industry-specific features
            $table->text('svg_icon')->nullable()->after('icon'); // For SVG icon content
            $table->string('category')->nullable()->after('content'); // For grouping industries
            $table->boolean('is_featured')->default(false)->after('status');
            $table->string('meta_title')->nullable()->after('is_featured');
            $table->string('meta_description')->nullable()->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'features',
                'svg_icon',
                'category',
                'is_featured',
                'meta_title',
                'meta_description',
            ]);
        });
    }
};
