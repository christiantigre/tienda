<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    public function index(){
    	$departments = Department::orderBy('id','depart')->paginate(5);
    	//dd($departments);
    	return view('admin.department.index', compact('departments'));
    }

    public function create(){
    	return view('admin.department.create');
    }

    public function show(Department $department){
    	return $department;
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'depart'=>'required|unique:departments|max:25'
    		]);

    	$department = Department::create([
    		'depart'=>$request->get('depart')
    		]);

    	$message = $department ? 'Departamento creado correctamente': 'El departamento no se pudo crear';
    	return redirect()->route('admin.department.index')->with('message', $message);
    }

    public function edit(Department $department){
    	return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, Department $department){
    	$department->fill($request->all());
    	$this->validate($request, [
    		'depart'=>'required|unique:departments|max:25'
    	]);

    	$updated = $department->save();

    	$message = $updated ? 'Departamento actualizado correctamente': 'El departamento no se pudo actualizar';
    	return redirect()->route('admin.department.index')->with('message', $message);	
    }

    public function destroy(Department $department){
    	$deleted = $department->delete();

    	$message = $deleted ? 'El departamento se elimino correctamente': 'El Departamento no se pudo eliminar';
    	return redirect()->route('admin.department.index')->with('message', $message);
    }
}
