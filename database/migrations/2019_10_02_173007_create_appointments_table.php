<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('physician_id')->unsigned();
            $table->integer('patient_id')->unsigned();
           
            $table->integer('relationship_id')->unsigned()->default(1)->nullable();
            $table->float('weight')->nullable();
            $table->string('accompanyng', 50)->nullable();
            $table->text('symptom')->nullable();
            $table->enum('condition',['Grave', 'Normal'])->default('Normal');
            $table->enum('status',['Agendado', 'Em atendimento', 'Atendido'])->default('Agendado');
            $table->date('dated_to');
            $table->time('date_time');

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
            $table->foreign('relationship_id')
                            ->references('id')
                            ->on('relationships')
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
        Schema::dropIfExists('appointments');
    }
}
