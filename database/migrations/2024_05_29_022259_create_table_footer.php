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
        Schema::create('footer', function (Blueprint $table) {
            $table->id();
            $table->string('hotline1')->nullable();
            $table->string('hotline2')->nullable();
            $table->string('hotline3')->nullable();
            $table->string('hotline4')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_zalo')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_footer');
    }
};
