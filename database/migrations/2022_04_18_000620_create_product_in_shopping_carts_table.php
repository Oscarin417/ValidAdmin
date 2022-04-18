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
        Schema::create('product_in_shopping_carts', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            //Llave foránea de la tabla de products
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            
            //Llave foránea de la tabla shopping_carts
            $table->bigInteger('shopping_cart_id')->unsigned();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
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
        Schema::dropIfExists('product_in_shopping_carts');
    }
};
