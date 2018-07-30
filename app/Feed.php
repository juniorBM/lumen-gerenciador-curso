<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {

    protected $fillable = ['title', 'image_post', 'user_id'];

}
