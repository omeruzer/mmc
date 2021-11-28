<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartproduct', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cart')->unsigned();
            $table->bigInteger('product')->unsigned();
            $table->integer('quantity');
            $table->decimal('amount',20,2);
            $table->string('status');
            $table->timestamps();

            $table->foreign('cart')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartproduct');
    }
}
