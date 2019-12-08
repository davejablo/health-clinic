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
            $table->bigIncrements('id');

            $table->integer('patient_profile_id')->unsigned();
            $table->foreign('patient_profile_id')->references('id')->on('patient_profiles');

            $table->integer('doctor_profile_id')->unsigned();
            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles');

            $table->integer('disease_id')->unsigned()->nullable();
            $table->foreign('disease_id')->references('id')->on('diseases');

//            $table->integer('prescription_id')->unsigned()->nullable();
//            $table->foreign('prescription_id')->references('id')->on('prescriptions');

            $table->string('symptom');
            $table->date('appointment_date');
            $table->time('appointment_time');

            $table->boolean('is_closed')->default(false);

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
