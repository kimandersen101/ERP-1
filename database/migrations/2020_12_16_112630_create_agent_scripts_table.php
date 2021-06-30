<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_scripts', function (Blueprint $table) {
            $table->foreignId('agent_id')->constrained('users');
            $table->unsignedSmallInteger('script_id');

            $table->text('template');

            $table->primary(['agent_id', 'script_id']);
            $table->unique(['agent_id', 'script_id']);

            $table->foreign('script_id')->references('id')->on('scripts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_scripts');
    }
}
