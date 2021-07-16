<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('physician_id')->unsigned();
            $table->text('symptom')->nullable();
            $table->float('weight')->nullable();
            $table->text('recipe')->nullable();
            $table->text('diagnostic')->nullable();
            $table->text('medical_advice')->nullable();
            $table->string('condition',100)->nullable();
            $table->string('date',15)->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
