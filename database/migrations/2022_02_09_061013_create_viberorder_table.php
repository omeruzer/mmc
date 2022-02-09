<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViberorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viberorder', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number');
            $table->bigInteger('viber_cart_product')->unsigned();
            $table->string('phone')->nullable();
            $table->timestamps();


            $table->foreign('viber_cart_product')->references('id')->on('vibercartproduct')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viberorder');
    }
}
