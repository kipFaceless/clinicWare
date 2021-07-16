<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('speciality_id')->unsigned();
            $table->string('name',100);
            $table->string('physician_order_number',191)->unique()->nullable();
            $table->string('tel',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('avatar',250)->nullable();
            $table->string('address',100)->nullable();
            $table->timestamps();

            $table->foreign('speciality_id')->references('id')
                                            ->on('specialities')
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
        Schema::dropIfExists('physicians');
    }
}
