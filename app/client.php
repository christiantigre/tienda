<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'name', 'email', 'apellidos','cedula','ruc','fechanacimiento','genero','telefono','celular','email','provincia_idprovincia','activo_idactivo','dir1','dir2','users_id','lt','lg',
    ];

public function country(){
    	return $this->belongsTo('App\Country');
    }

}
