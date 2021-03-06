<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('api_token')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
