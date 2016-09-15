<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class intentos extends Model
{
    protected $table = 'intentos';

    protected $fillable = ['intentos','isactive_id'];

    public $timestamps = false;
}
