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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('catalog_id'); //Danh mục
            $table->string('name', 125); //Tên sản phẩm
            $table->string('brand', 125); //Tên thương hiệu
            $table->string('type', 125); //Loại sản phẩm
            $table->string('model', 125); //Mã sản phẩm
            $table->string('feature', 125); //Tính năng sản phẩm
            $table->integer('price')->default(0);
            $table->integer('old_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->text('content');
            $table->text('specifications');
            $table->string('image_link', 50);
            $table->text('image_list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
