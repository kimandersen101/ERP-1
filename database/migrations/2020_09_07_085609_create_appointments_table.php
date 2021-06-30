<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents', 'user_id');
            $table->foreignId('lead_id')->constrained('leads', 'user_id');
            $table->foreignId('agent_task_id')->nullable();

            $table->timestamp('date')->index();
            $table->boolean('is_notified')->default(false)->index();
            $table->string('google_event')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('live_appointment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
