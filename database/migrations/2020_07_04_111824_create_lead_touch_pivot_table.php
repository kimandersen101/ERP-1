<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadTouchPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_touch', function (Blueprint $table) {

            $table->id();
            $table->foreignId('lead_id')->constrained('leads', 'user_id');
            $table->unsignedSmallInteger('touch_id')->nullable();
            $table->foreignId('agent_id')->constrained('agents', 'user_id');
            $table->foreignId('agent_task_id')->nullable()->constrained('agent_task');

            $table->text('script');
            $table->enum('channel', ['TEXT', 'EMAIL', 'WHATSAPP', 'MANUAL' ]);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('touch_id')->references('id')->on('touches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_touch');
    }
}
