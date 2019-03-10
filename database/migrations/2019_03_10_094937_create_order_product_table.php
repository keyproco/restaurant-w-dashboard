<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('order_items', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('product_id');
        //     $table->unsignedInteger('orders_id');
        //     $table->unsignedInteger('quantity');
        //     $table->timestamps();
        // });
                Schema::create('orders_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('orders_id');
            $table->unsignedInteger('quantity');
            $table->primary(['product_id','orders_id']);     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
