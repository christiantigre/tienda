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
     *foreach ($clients as $cliente) {
                    //$user = User::find($cliente->id);
                    $ultimaactiv = $user->actividad;
                    $diffs = $ultimaactiv->diffForHumans(Carbon::now());
                }

        //$query->where('actividad','<=',Carbon::now());
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'actividad',
    ];

    



    public function actividades($query)
    {
        $fecha = $query->diffForHumans(Carbon::now());
        //return 1; 
        return $fecha;
    }


    public function actividad()
    {

        $diff = Carbon::now()->diffForHumans(Carbon::createFromFormat('Y-m-d',$this->fechadeingreso));

        /*Cambiar Y-m-d por el formato que tengas*/
        return $diff;
    }


}
