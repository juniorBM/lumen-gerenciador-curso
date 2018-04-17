<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $fillable = ['nome', 'descricao'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
