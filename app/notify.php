<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    protected $table = 'notify';
    protected $fillable = ['min_prod','val_sale'];
    public $timestamps = false;
}
