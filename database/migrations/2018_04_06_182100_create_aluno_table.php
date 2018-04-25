<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{

    public function up()
    {
        Schema::create('alunos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email');
            $table->date('data_nascimento');
            $table->enum('sexo', [1, 2]);
            $table->string('cor', 25)->nullabel();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('aluno');
    }
}
