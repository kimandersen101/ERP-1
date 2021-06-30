<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->nullable()->constrained();
            $table->unsignedSmallInteger('product_id');
            $table->unsignedSmallInteger('linked_product_id')->nullable();

            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable()->index();

            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('linked_product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_items');
    }
}
