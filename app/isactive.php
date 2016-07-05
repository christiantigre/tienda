<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class isactive extends Model
{
    protected $table = 'isactives';
    protected $fillable = ['name', 'val'];
    public $timestamps = false;

    public function isactives(){
    	return $this->hasMany('App\Isactive');
    }
}
