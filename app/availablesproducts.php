<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availablesproducts extends Model
{
    protected $table = 'availables_products';

    protected $fillable = ['availables_id','products_id'];

    public $timestamps = false;

    public function availables(){
    	return $this->belongsTo('App\available');
    }
    
}
