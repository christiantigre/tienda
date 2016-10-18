<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','is_admin','comfirm_token','rol','actividad'
    ];


    protected $casts = [
        'is_admin' => 'boolean',
        'status' => 'boolean'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'actividad',
    ];

    
    public function scopeActividad($query)
    {
        $query->where('actividad','<=',Carbon::now());
    }
}
