<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveEmpRequest;
use App\Http\Controllers\Controller;
use App\Emp;
use App\Position;
use App\Department;
use App\Country;
use App\Province;
use App\Isactive;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            if(\Auth::user()->is_admin){
                $emps = Emp::all();
                return view('admin.emp.index', compact('emps'));
            }else{
                \Auth::logout();
                return redirect('login');
            }
        }else{
            \Auth::logout();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::orderBy('id', 'asc')->lists('poss','id');
        $departments = Department::orderBy('id', 'asc')->lists('depart','id');
        $countries = Country::orderBy('id', 'asc')->lists('country','id');
        $provinces = Province::orderBy('id', 'desc')->lists('prov','id');
        $isactives = Isactive::orderBy('id', 'asc')->lists('name','val');
        //dd($isactives);
        return view('admin.emp.create',compact('positions','departments','countries','isactives','provinces'));
        //return view('admin.emp.create', compact('emps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEmpRequest $request)
    {       //dd($request);
        $data = [
        'nombres' =>$request->get('nombres'),
        'apellidos' =>$request->get('apellidos'),
        'fechanacimiento' =>$request->get('fechanacimiento'),
        'cedula' =>$request->get('cedula'),
        'genero' =>$request->get('genero'),
        'cargo_id' =>$request->get('cargo_id'),
        'department_id' =>$request->get('department_id'),            
        'country_id' =>$request->get('country_id'),            
        'province_id' =>$request->get('province_id'), 
        'isactive_id' =>$request->get('isactive_id'), 
        'telefono' =>$request->get('telefono'),
        'celular' =>$request->get('celular'),
        'email' =>$request->get('email'), 
        'img' =>$request->get('img'),
        'dir' =>$request->get('dir'), 
        'estcivil' =>$request->get('estcivil'),
        'sld' =>$request->get('sld'),
        'password' =>bcrypt($request->get('cedula'))
        ];
        $emp = Emp::create($data);
        $message = $emp ? 'Empleado creado correctamente': 'El empleado no se pudo crear';
        return redirect()->route('admin.emp.index')->with('message', $message);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        $positions = Position::orderBy('id', 'asc')->lists('poss','id');
        $departments = Department::orderBy('id', 'asc')->lists('depart','id');
        $countries = Country::orderBy('id', 'asc')->lists('country','id');
        $provinces = Province::orderBy('id', 'desc')->lists('prov','id');
        $isactives = Isactive::orderBy('id', 'asc')->lists('name','id');
        return view('admin.emp.show', compact('emp','positions','departments','countries','provinces','isactives'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        $positions = Position::orderBy('id', 'asc')->lists('poss','id');
        $departments = Department::orderBy('id', 'asc')->lists('depart','id');
        $countries = Country::orderBy('id', 'asc')->lists('country','id');
        $provinces = Province::orderBy('id', 'desc')->lists('prov','id');
        $isactives = Isactive::orderBy('id', 'asc')->lists('name','id');
        return view('admin.emp.edit',compact('emp','positions','departments','countries','isactives','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emp $emp)
    {
        $emp->fill($request->all());
        $updated = $emp->save();

        $message = $updated ? 'Empleado actualizado correctamente': 'El empleado no se pudo actualizar';
        return redirect()->route('admin.emp.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        $deleted = $emp->delete();

        $message = $deleted ? 'El empleado se elimino correctamente': 'empleadoproducto no se pudo eliminar';
        return redirect()->route('admin.emp.index')->with('message', $message);
    }
}
