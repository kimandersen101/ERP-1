<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('actor_id')->constrained('users');
            $table->unsignedSmallInteger('promo_id')->nullable();
            $table->unsignedSmallInteger('live_order_id')->nullable();
            $table->double('discount', 10,2)->nullable();
            $table->double('shipping_discount', 10,2)->nullable();
            $table->double('total', 10,2);
            $table->double('tax', 10,2);
            $table->double('subtotal', 10,2);
            $table->double('shipping_price', 10,2);
            $table->unsignedSmallInteger('loyalty_discount_percent')->nullable();

            $table->enum('payment_method', ['CARD', 'BANK_FINANCING', 'SA_FINANCING', 'CHECK'])->index();
            $table->enum('status', ['APP_FINANCING', 'DOCUMENT_SIGNING', 'CHECK_CLEARING', 'PACKING', 'SHIPPING', 'APT_SCHEDULING', 'INSTALLING', 'FUNDING', 'CANCELLED', 'FULFILLED'])->nullable()->index();
            $table->enum('type', ['SHOP', 'AFFILIATE', 'SUBSCRIPTION']);
            $table->json('log')->nullable();

            $table->foreign('promo_id')->references('id')->on('promos');

            $table->timestamps();
            $table->softDeletes();
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
}
