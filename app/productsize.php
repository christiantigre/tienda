<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsize extends Model
{
    protected $table = 'product_size';

    protected $fillable = ['product_id','size_id'];

    public $timestamps = false;

    public function size(){
    	return $this->belongsTo('App\Size');
    }
}
