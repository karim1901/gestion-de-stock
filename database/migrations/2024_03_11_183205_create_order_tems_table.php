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
        Schema::create('order_tems', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_product')->unique();

            $table->foreign('id_product')->references('id')->on('products');

            $table->integer('quntityP');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tems');
    }
};
