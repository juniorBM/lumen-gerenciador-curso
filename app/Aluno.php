<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {

    protected $fillable = [
        'nome', 'sobrenome', 'email', 'data_nascimento', 'sexo', 'cor'
    ];

}
