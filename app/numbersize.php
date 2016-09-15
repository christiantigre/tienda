<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class numbersize extends Model
{
    protected $table = 'numbersizes';

    protected $fillable = ['number'];

    public $timestamps = false;
    
    public function products(){
    	return $this->hasMany('App\Product');
    }
}
