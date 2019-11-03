<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Personal;
use App\Position;
use App\Department;
use App\Country;
use App\Province;
use App\Isactive;
use App\Svlog;

class PersonController extends Controller
{
	public function index(){
       if(\Auth::check()){
        if(\Auth::user()->is_admin){
            $emps = Personal::all();
            $this->genLog("Ingresó a gestión de personal");
            return view('admin.person.index', compact('emps'));
        }else{
            \Auth::logout();
            $this->genLog("No autorizado en gestión de personal");
            return redirect('login');
        }
    }else{
        \Auth::logout();
    }
}

public function create(){
    $positions = Position::orderBy('id', 'desc')->lists('poss','id');
    $departments = Department::orderBy('id', 'desc')->lists('depart','id');
    $countries = Country::orderBy('id', 'asc')->lists('country','id');
    $provinces = Province::orderBy('id', 'asc')->lists('prov','id');
    $isactives = Isactive::orderBy('id', 'asc')->lists('name','val');
    return view('admin.person.create',compact('positions','departments','countries','isactives','provinces'));
}

public function edit(){

}

public function show(){

}

public function destroy(){

}

public function genLog($mensaje)
{
    $area = 'Administracion';
    //$logs = Svlog::log($mensaje,$area);
}
}
