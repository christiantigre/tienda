<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class emp extends Authenticatable
{
    protected $table = 'emps';
    protected $fillable = ['nombres','apellidos','fechanacimiento','genero','cedula','cargo_id','department_id','country_id','province_id','isactive_id','telefono','celular','email','img','dir','estcivil','sld','username','password'];

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

    protected $hidden = [
        'password', 'remember_token',
    ];
}
