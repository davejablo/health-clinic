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
            $table->bigIncrements('appointment_id');

            $table->integer('patient_profile_id')->unsigned();
            $table->integer('doctor_profile_id')->unsigned();

            $table->foreign('patient_profile_id')->references('id')->on('patient_profiles');
            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles');

            $table->string('symptom');
            $table->boolean('is_closed')->default(false);
            $table->date('appointment_date');
            $table->time('appointment_time');

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
        Schema::dropIfExists('appointments');
    }
}
