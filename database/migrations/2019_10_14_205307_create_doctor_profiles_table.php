<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('doctor_specialization_id')->nullable();
            $table->date('birthDate')->nullable();
            $table->unsignedSmallInteger('gender')->nullable();
            $table->string('phone',10)->unique();
            $table->string('locality');
            $table->string('street')->nullable();
            $table->decimal('ratingScore')->nullable();
            $table->decimal('ratingTotal')->nullable();
            $table->integer('ratingCounter')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('doctor_specialization_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_profiles');
    }
}
