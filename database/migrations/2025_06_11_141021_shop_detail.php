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
        Schema::create('shop_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shop');
            $table->foreignId('product_id')->constrained('products');
            $table->double('qty');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopdetail');
    }
};
