<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['prov'];
    public $timestamps = false;

    public function countries(){
    	return $this->hasMany('App\Province');
    }
}
