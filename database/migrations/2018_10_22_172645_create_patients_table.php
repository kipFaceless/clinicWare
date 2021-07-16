<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('identification', ['Bilhete','Cédula', 'Passaporte', 'Acento','Outro'])->nullable();
            $table->string('identification_number')->nullable();
            $table->string('name', 100)->default('Paciente');
            $table->integer('date_of_birth')->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->string('address', 100)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('email',100)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
