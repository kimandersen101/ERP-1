<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('subscription_id')->nullable()->constrained();
            $table->unsignedSmallInteger('product_id');
            $table->foreignId('user_address_id')->nullable()->constrained();
            $table->foreignId('installer_id')->nullable()->constrained();

            $table->unsignedTinyInteger('household_size')->nullable();
            $table->string('nickname')->nullable();
            $table->boolean('is_well_water')->nullable();
            $table->string('stripe_source_id')->nullable();
            $table->boolean('has_filtration_system')->nullable();
            $table->boolean('has_micron_system')->nullable();
            $table->enum('install_option',['NEED_INSTALLER', 'HAS_CONTRACTOR', 'DIY'])->nullable();
            $table->unsignedTinyInteger('zone')->nullable();
            $table->unsignedTinyInteger('p1_validity_months')->nullable();
            $table->double('subtotal', 10,2)->nullable();
            $table->float('tax_percent')->nullable();
            $table->double('tax', 10,2)->nullable();
            $table->double('shipping_price', 10,2)->nullable();
            $table->text('tracking_info')->nullable();

            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedBigInteger('live_customer_subscription_order_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
