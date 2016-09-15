<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table = 'sizes';

    protected $fillable = ['name','abreviatura'];

    public $timestamps = false;

    public function products(){
    	return $this->hasMany('App\Product');
    }
}
