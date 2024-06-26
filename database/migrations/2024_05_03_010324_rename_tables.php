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
        //
        Schema::rename('admin', 'admins');
        Schema::rename('product', 'products');
        Schema::rename('catalog', 'catalogs');
        Schema::rename('order', 'orders');
        Schema::rename('transaction', 'transactions');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
