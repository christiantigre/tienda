<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $table = 'positions';
    protected $fillable = ['poss'];
    public $timestamps = false;

    public function position(){
    	return $this->belongsTo('App\Position');
    }
}
