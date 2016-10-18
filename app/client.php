<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class client extends Model
{
	protected $table = 'clients';
    protected $fillable = [
        'name','path', 'email', 'apellidos','cedula','ruc','fechanacimiento','genero','telefono','celular','email','provincia_idprovincia','activo_idactivo','dir1','dir2','users_id','lt','lg','imagen'
    ];


    public function setPathAttribute($path){
    	if (!empty($path)){
    	$name = Carbon::now()->second.$path->getClientOriginalName();
    	$this->attributes['path'] = $name;
    	\Storage::disk('local')->put($name, \File::get($path));
    	}    	
    }

    public function provincia(){
        return $this->belongsTo('App\Province');
    }


}
