<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phpatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customerName');
            $table->string('gender');
            $table->integer('age');
            $table->string('remarks');
            $table->integer('diagnosis');
            $table->string('referDoctor');
            $table->string('referHospital');
            $table->integer('register');
            $table->unsignedBigInteger('refer_idDoc');
            $table->unsignedBigInteger('refer_idHos');
            $table->unsignedBigInteger('refer_idDia');
            $table->foreign('refer_idDoc')->references('id')->on('referDoctors');
            $table->foreign('refer_idHos')->references('id')->on('referHospitals');
            $table->foreign('refer_idDia')->references('id')->on('diagnoses');
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
        Schema::dropIfExists('phpatients');
    }
}
