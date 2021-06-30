<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users');
            $table->unsignedSmallInteger('promo_id')->nullable();
            $table->unsignedBigInteger('live_user_event_id')->nullable();

            $table->string('title');
            $table->string('username')->index();

            $table->boolean('show_info')->default(false);
            $table->boolean('show_picture')->default(false);
            $table->boolean('is_handoff')->default(false);
            $table->boolean('show_company')->default(false);

            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('promo_id')->references('id')->on('promos');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_events');
    }
}
