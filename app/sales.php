<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $table = 'sales';
    protected $fillable = ['pedido_id','numfactura','claveacceso'];
    public $timestamps = false;
}
