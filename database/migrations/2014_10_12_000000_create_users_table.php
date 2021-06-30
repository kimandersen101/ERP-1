<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('users');
            $table->unsignedBigInteger('live_customer_id')->nullable();
            $table->unsignedBigInteger('live_parent_id')->nullable();
            $table->unsignedBigInteger('live_user_event_id')->nullable();

            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('timezone')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_loyalty_member')->nullable();
            $table->boolean('is_payment_failed')->default(false);
            $table->boolean('is_retry_prevented')->default(false);
            $table->unsignedSmallInteger('loyalty_discount_percent')->nullable();
            $table->string('stripe_customer_id')->nullable();
            $table->enum('source', ['ADMIN', 'APP', 'COLD_MARKET', 'PHONE']);
            $table->boolean('is_test')->default(false)->index();
            $table->string('password')->nullable();
            $table->string('picture_modified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
