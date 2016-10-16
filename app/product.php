<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['nombre','path','slug','codbarra','cant','pre_com','pre_ven','img',
    'prgr_tittle','nuevo','promocion','catalogo','category_id','brand_id','isactive_id','sections_id'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }

    public function sections(){
    	return $this->belongsTo('App\Sections');
    }

}
