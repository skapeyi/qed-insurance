<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->date('insurance_period_start');
            $table->date('insurance_period_end');
            $table->string('reg_number');
            $table->string('reg_owner');
            $table->string('make');
            $table->string('color');
            $table->string('cubic_capacity');
            $table->string('tonnage');
            $table->string('year_of_manufacture');
            $table->string('engine_no');
            $table->string('chasis_no');
            $table->string('seating_capacity');
            $table->string('use');
            $table->boolean('statutory');
            $table->boolean('third_party_property_damage');
            $table->string('third_party_property_damage_limit');
            $table->boolean('acknowledgement');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_requests');
    }
}
