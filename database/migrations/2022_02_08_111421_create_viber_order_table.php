<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViberOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viber_order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cartProduct_id')->unsigned();
            $table->string('phone');
            $table->timestamps();

            $table->foreign('cartProduct_id')->references('id')->on('viber_cart_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viber_order');
    }
}
