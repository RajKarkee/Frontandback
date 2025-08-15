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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('our_story_title');
            $table->text('our_story_content');
            $table->string('our_story_image')->nullable();
            $table->string('core_values_title');
            $table->text('core_values_subtitle');
            $table->string('leadership_title');
            $table->text('leadership_subtitle');
            $table->string('expertise_title');
            $table->text('expertise_subtitle');
            $table->string('why_choose_us_title');
            $table->text('why_choose_us_subtitle');
            $table->string('cta_title');
            $table->text('cta_subtitle');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
