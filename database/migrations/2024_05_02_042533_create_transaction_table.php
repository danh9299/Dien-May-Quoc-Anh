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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('user_name', 50);
            $table->string('user_email', 50);
            $table->string('user_phone', 20);
            $table->integer('total_amount')->default(0);
            $table->string('payment_gate', 32);
            $table->text('payment_info');
            $table->string('message', 255);
            $table->string('security', 16);
            $table->integer('created')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
