<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['user','admin','patient', 'physician', 'receptionist', 'guest','supAdmin'])->default('user');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('avatar', 100)->nullable();
            $table->string('tel', 30)->nullable();
            $table->string('address', 100)->nullable();
           // $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
