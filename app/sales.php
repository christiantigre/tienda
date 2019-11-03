<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $table = 'sales';
    protected $fillable = [
    	'pedido_id','numfactura','claveacceso','gen_xml','fir_xml','aut_xml','convrt_ride','send_xml','send_pdf',
    	'mensaje','fech_autoriz','estado_aprob','num_autoriz'
    ];
    public $timestamps = false;
}
