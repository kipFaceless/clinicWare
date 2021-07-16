<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('physician_id')->unsigned();
            $table->text('diagnostic')->nullable();
            $table->text('medical_advice')->nullable();
            $table->text('recipe')->nullable();
            $table->text('symptom')->nullable();
            $table->float('weight')->nullable();
            $table->string('today')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

        

           
            
           $table->foreign('patient_id')
                            ->references('id')
                            ->on('patients')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                            
                             $table->foreign('physician_id')
                            ->references('id')
                            ->on('physicians')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');

           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advices');
    }
}
