<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->timestamp('tos_agreed_at', 0)->nullable();
            $table->timestamp('wizard_completed_at', 0)->nullable();
            $table->string('app_version', 10)->nullable();
            $table->enum('device_platform',['ANDROID', 'IOS'])->nullable();
            $table->string('device_os', 10)->nullable();
            $table->string('device_token')->nullable();

            // one-to-one relationship with 'users'
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
