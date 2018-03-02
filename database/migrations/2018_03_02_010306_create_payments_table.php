<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('insurance_request_id')->unsigned();
            $table->string('phone_number')->nullable();
            $table->string('narrative')->nullable();
            $table->integer('status')->nullable();
            $table->integer('internal_ref')->nullable();
            $table->integer('external_ref')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->foreign('insurance_request_id')->references('id')->on('insurance_requests');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void)
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
