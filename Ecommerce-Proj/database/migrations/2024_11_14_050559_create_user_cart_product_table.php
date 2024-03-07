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
        Schema::create('user_cart_products', function (Blueprint $table) {
            $table->id();
            $table->string('cart_id');
            $table->string('product_id');
            $table->integer('wish_list')->default(0)->comment('1 -> added, 0 -> not_added ' )->nullable();
            $table->integer('qunatity');
            $table->timestamps();
            $table->foreign('cart_id')->references('card_id')->on('user_carts')->onDelete('cascade');
            $table->foreign('product_id')->references('sku_number')->on('product_tables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cart_products');
    }
};
