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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key_statistics_title')->default('Key Statistics');
            $table->text('key_statistics_subtitle')->nullable();
            $table->json('statistics')->nullable(); // [{label: '', value: '', icon: ''}]
            $table->string('why_choose_us_title')->default('Why Choose Chartered Insights');
            $table->text('why_choose_us_subtitle')->nullable();
            $table->json('features')->nullable(); // [{title: '', description: '', icon: ''}]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
