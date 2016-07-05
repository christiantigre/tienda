<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresaa extends Model
{
    protected $table = 'empress';
    protected $fillable = ['nom','ruc','tlfun','tlfds','fax','cel','dir','pagweb','img','ln','lg','email','observ','prop','gernt'];
    public $timestamps = false;
}
