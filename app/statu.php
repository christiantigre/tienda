<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statu extends Model
{
    protected $table = 'status';
    protected $fillable = ['statu'];
    public $timestamps = false;

    public function status(){
    	return $this->hasMany('App\Statu');
    }

}
