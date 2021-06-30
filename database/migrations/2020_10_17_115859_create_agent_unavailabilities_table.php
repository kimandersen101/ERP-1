<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentUnavailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_unavailabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents', 'user_id');

            $table->enum('type', ['date', 'weekday'])->index();
            $table->enum('weekday', ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'])->nullable();

            $table->date('date')->nullable();
            $table->time('slot')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_unavailabilities');
    }
}
