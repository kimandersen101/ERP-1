<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained();
            $table->unsignedSmallInteger('product_id');
            $table->double('price', 10,2);
            $table->double('shipping_price', 10,2)->nullable();

            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedBigInteger('live_customer_orderline_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_details');
    }
}
