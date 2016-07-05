<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    
	protected $table = 'proveedors';
    protected $fillable = ['nom_compania', 'ruc', 'telefono', 'celular', 'fax', 'fecharegistro', 'direccion', 'codigopostal', 'email', 'pagweb', 'observacion','logo', 'country_id', 'prov_id', 'isactive_id'];
    public $timestamps = false;

    public function proveedor(){
    	return $this->belongsTo('App\Proveedor');
    }
    public function country(){
    	return $this->belongsTo('App\Country');
    }
    public function prov(){
    	return $this->belongsTo('App\Province');
    }

}
