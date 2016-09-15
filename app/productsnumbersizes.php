<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsnumbersizes extends Model
{
    protected $table = 'products_numbersizes';

    protected $fillable = ['products_id','numbersizes_id'];

    public $timestamps = false;

    public function numbersizes(){
    	return $this->belongsTo('App\numbersize');
    }

}
