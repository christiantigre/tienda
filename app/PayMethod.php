<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayMethod extends Model
{
    protected $table = 'paymethods';
    protected $fillable = ['namemethod','nomtitular','numcuent','institution'];
    public $timestamps = false;
}
