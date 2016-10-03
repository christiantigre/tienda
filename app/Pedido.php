<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $fillable = ['subtotal','total','iva','porc','entrega','ubiclg','ubiclt','date','users_id','status_id','paymethods_id','descuento','propina'];
    public $timestamps = false;

    public function paymethods(){
    	return $this->belongsTo('App\PayMethod');
    }

    public function status(){
    	return $this->belongsTo('App\statu');
    }

    public function users(){
    	return $this->belongsTo('App\client');
    }

}
