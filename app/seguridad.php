<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seguridad extends Model
{
    protected $table = 'seguridad';

    protected $fillable = ['seguridad','intentos_id','fechaconfig'];

    public $timestamps = false;

    public function intentos(){
    	return $this->belongsTo('App\intentos');
    }
}
