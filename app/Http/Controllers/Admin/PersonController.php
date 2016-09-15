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

class PersonController extends Controller
{
	public function index(){
    	if(\Auth::check()){
        if(\Auth::user()->is_admin){
        $emps = Personal::all();
        return view('admin.person.index', compact('emps'));
    }else{
                \Auth::logout();
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
}
