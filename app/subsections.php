<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subsections extends Model
{
    protected $table = 'subsections';

    protected $fillable = ['Category','Section','descripcion'];

    public $timestamps = false;

	 public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function section(){
    	return $this->belongsTo('App\Sections');
    }
}
