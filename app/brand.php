<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';

    protected $fillable = ['brand','isactive_id'];

    public $timestamps = false;

	public function products(){
    	return $this->hasMany('App\Product');
    }

}
