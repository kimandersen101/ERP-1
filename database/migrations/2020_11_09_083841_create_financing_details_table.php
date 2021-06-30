<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financing_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('user_address_id')->constrained();
            $table->foreignId('co_applicant_parent_id')->nullable()->constrained('financing_details');

            $table->string('financing_type');
            $table->boolean('own_home');
            $table->boolean('is_applicant');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('ssn');
            $table->string('employer_name');
            $table->string('annual_income')->nullable();
            $table->string('income_type')->nullable();
            $table->string('gross_monthly_income')->nullable();
            $table->string('year_job')->nullable();
            $table->string('month_job')->nullable();
            $table->string('identification_type')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('state_id_number')->nullable();
            $table->unsignedSmallInteger('identification_state_id')->nullable();
            $table->unsignedSmallInteger('identification_country_id')->nullable();
            $table->date('identification_issue_date')->nullable();
            $table->date('identification_expiry_date')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('identification_state_id')->references('id')->on('states');
            $table->foreign('identification_country_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financing_details');
    }
}
