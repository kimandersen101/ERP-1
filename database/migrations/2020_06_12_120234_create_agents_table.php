<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('username')->nullable()->index();
            $table->string('company')->nullable();

            $table->string('optin_username')->nullable()->index();
            $table->boolean('is_optin_handoff')->default(false);
            $table->boolean('optin_show_phone')->default(false);
            $table->boolean('hide_action_popup')->default(false);
            $table->boolean('hide_task_popup')->default(false);
            $table->boolean('hide_initial_popup')->default(false);
            $table->json('commission_defaults')->nullable();

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
        Schema::dropIfExists('agents');
    }
}
