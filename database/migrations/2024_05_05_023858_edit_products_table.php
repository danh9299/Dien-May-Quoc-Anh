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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->after('catalog_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            
            $table->unsignedBigInteger('feature_id')->after('catalog_id');
            $table->foreign('feature_id')->references('id')->on('features');
            
            $table->unsignedBigInteger('type_id')->after('catalog_id');
            $table->foreign('type_id')->references('id')->on('types');
        });
        
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
