<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['nombre','slug','codbarra','cant','pre_com','pre_ven','img','prgr_tittle','nuevo','promocion','catalogo','category_id','brand_id','isactive_id'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

}
