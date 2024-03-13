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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('totale',10,2);
            
            $table->string('supplier');

            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients');

            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            
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
        Schema::dropIfExists('orders');
    }
};
