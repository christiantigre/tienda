<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp extends Model
{
    protected $table = 'emps';
    protected $fillable = ['nombres','apellidos','fechanacimiento','genero','cedula','cargo_id','department_id','country_id','province_id','isactive_id',
    'telefono','celular','email','img','dir','estcivil','sld'];

    public function cargo(){
    	return $this->belongsTo('App\Position');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function country(){
    	return $this->belongsTo('App\Country');
    }

    public function province(){
    	return $this->belongsTo('App\Province');
    }

    public function isactives(){
    	return $this->belongsTo('App\Isactive');
    }
}
