<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'itempedido';
    protected $fillable = ['products_id','prec','cant','pedido_id','size','preference','number'];
    public $timestamps = false;

    public function products(){
    	return $this->belongsTo('App\Product');
    }


}
