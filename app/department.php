<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
	protected $table = 'departments';
    protected $fillable = ['depart'];
    public $timestamps = false;

    public function departments(){
    	return $this->hasMany('App\Department');
    }

}
