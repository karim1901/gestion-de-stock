<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');

            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders');

            $table->integer('quntityP');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_orders');
    }
};
