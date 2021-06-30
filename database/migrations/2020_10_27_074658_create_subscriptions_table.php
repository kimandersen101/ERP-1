<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained();
            $table->foreignId('actor_id')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_address_id')->nullable()->constrained();
            $table->unsignedSmallInteger('product_id');
            $table->boolean('is_old_box')->default(false);

            $table->string('nickname')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->unsignedTinyInteger('zone')->default(1);
            $table->unsignedTinyInteger('household_size')->default(2);
            $table->unsignedTinyInteger('p1_validity_months')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
