<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadHandoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_handoffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users');
            $table->foreignId('lead_id')->constrained('users');
            $table->foreignId('support_id')->constrained('users');

            $table->text('notes')->nullable();
            $table->enum('type', ['APPOINTMENT', 'GROUP_CHAT', 'DIRECT']);
            $table->unsignedSmallInteger('lead_touch_id')->nullable();
            $table->unsignedSmallInteger('appointment_id')->nullable();

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
        Schema::dropIfExists('lead_handoffs');
    }
}
