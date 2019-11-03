<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Svlog;

class CategoryController extends Controller
{

    public function index(){
        if(\Auth::check()){
            if(\Auth::user()->is_admin){
               $categories = Category::all();
               $this->genLog("Ingresó en gestión de categoria");
               return view('admin.category.index', compact('categories'));
           }else{
            \Auth::logout();
            return redirect('login');
        }
    }else{
        \Auth::logout();
    }
    }


public function create(){
   return view('admin.category.create');
}


public function store(Request $request){

   $this->validate($request, [
      'name'=>'required|unique:categories|max:255'
      ]);

   $category = Category::create([
      'name'=>$request->get('name'),
      'description'=>$request->get('description')
      ]);

   $message = $category ? 'Categoria creada correctamente': 'La categoria no se pudo crear';
   return redirect()->route('admin.category.index')->with('message', $message);
}


public function show(Category $category){
   return $category;
}


public function edit(Category $category){
   return view('admin.category.edit', compact('category'));
}


public function update(Request $request, Category $category){
   $category->fill($request->all());
   $updated = $category->save();

   $message = $updated ? 'Categoria actualizada correctamente': 'La categoria no se pudo actualizar';
   return redirect()->route('admin.category.index')->with('message', $message);
}


public function destroy(Category $category){
   $deleted = $category->delete();

   $message = $deleted ? 'Categoria se elimino correctamente': 'La categoria no se pudo eliminar';
   return redirect()->route('admin.category.index')->with('message', $message);
}


public function genLog($mensaje)
{
    $area = 'Administracion';
    //$logs = Svlog::log($mensaje,$area);
}


}
