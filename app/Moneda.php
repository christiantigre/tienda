<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'moneda';
    protected $fillable = ['moneda','isactive_id'];
    public $timestamps = false;
}
