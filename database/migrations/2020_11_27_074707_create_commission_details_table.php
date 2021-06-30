<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents', 'user_id');
            $table->foreignId('lead_id')->constrained('leads', 'user_id');
            $table->unsignedSmallInteger('commission_default_id');
            $table->foreignId('order_item_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->timestamp('qualified_at')->nullable();
            $table->timestamp('posted_at')->nullable()->index();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('commission_default_id')->references('id')->on('commission_defaults');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_details');
    }
}
