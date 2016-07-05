<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['country','nation'];
    public $timestamps = false;

    public function countries(){
    	return $this->hasMany('App\Country');
    }
}
