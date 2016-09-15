<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class available extends Model
{
    protected $table = 'availables';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function products(){
    	return $this->hasMany('App\Product');
    }

}
