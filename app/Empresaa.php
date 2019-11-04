<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresaa extends Model
{
    protected $table = 'empress';
    protected $fillable = ['nom','ruc','tlfun','tlfds','fax','cel','dir','pagweb','img','ln','lg','email','observ','prop','gernt','razonsoc','moneda_id','iva_id','codestablecimiento','codpntemision','dirmatriz','ambiente','pathcertificate','obligadocontbl','fecha_caduca','passcertificate','key_google','enlace_recepcion','enlace_autorizacion','alert_developer','alert_incidencias'];
    public $timestamps = false;
}
