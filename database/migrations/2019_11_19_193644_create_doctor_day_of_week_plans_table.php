<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDayOfWeekPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_day_of_week_plans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('doctor_profile_id')->unsigned()->nullable();
            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles');

            $table->smallInteger('day_of_week')->unsigned()->nullable();

            $table->time('from_hour');
            $table->time('to_hour');

            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();

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
        Schema::dropIfExists('doctor_day_of_week_plans');
    }
}
