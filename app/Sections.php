<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table = 'sections';

    protected $fillable = ['name','descripcion'];

    public $timestamps = false;

	public function products(){
    	return $this->hasMany('App\Product');
    }  

    public function subsecciones(){
		return $this->hasMany('App\Product');
	}

	public function subsection(){
		return $this->hasMany('App\subsections');
	}
}
