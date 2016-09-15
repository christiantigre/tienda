<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    protected $table = 'iva';
    protected $fillable = ['iva','isactive_id','codporcentaje'];
    public $timestamps = false;
}
