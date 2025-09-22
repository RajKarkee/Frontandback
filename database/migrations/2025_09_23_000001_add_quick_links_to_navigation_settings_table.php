<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('navigation_settings', function (Blueprint $table) {
            $table->json('quick_links')->nullable();
        });
    }

    public function down()
    {
        Schema::table('navigation_settings', function (Blueprint $table) {
            $table->dropColumn('quick_links');
        });
    }
};
