<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveProductoRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Isactive;
use App\Brand;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::orderBy('id', 'desc')->paginate(5);
    	return view('admin.product.index', compact('products'));
    }

    public function create(){
    	$categories = Category::orderBy('id', 'desc')->lists('name','id');
        $isactives = Isactive::orderBy('id', 'asc')->lists('name','id');
        $brands = Brand::orderBy('id', 'asc')->lists('brand','id');
    	return view('admin.product.create', compact('categories','isactives','brands'));
    }

    public function store(SaveProductoRequest $request){
       // dd($request);
        $data = [
            'nombre' => $request->get('nombre'),
            'slug' => str_slug($request->get('nombre')),
            'codbarra' => $request->get('codbarra'),
            'cant' => $request->get('cant'),
            'pre_com' => $request->get('pre_com'),
            'pre_ven' => $request->get('pre_ven'),
            'img' => $request->get('img'),
            'prgr_tittle' => $request->get('prgr_tittle'),
            'nuevo' => $request->has('nuevo') ? 1 : 0,
            'promocion' => $request->has('promocion') ? 1 : 0,
            'catalogo' => $request->has('catalogo') ? 1 : 0,
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'isactive_id' => $request->get('isactive_id')
        ];

        $product = Product::create($data);
        $message = $product ? 'Producto creado correctamente': 'El producto no se pudo crear';
        return redirect()->route('admin.product.index')->with('message', $message);

    }

    public function show(Product $product){
        //dd($product);
        return view('admin.product.show',compact('product'));
    }

    public function edit(Product $product){
        //dd($product);
        $categories = Category::orderBy('id', 'desc')->lists('name','id');
        $isactives = Isactive::orderBy('id', 'asc')->lists('name','id');
        $brands = Brand::orderBy('id', 'asc')->lists('brand','id');
        return view('admin.product.edit',compact('product','categories','isactives','brands'));
    }

    public function update(Request $request, Product $product){
        $product->fill($request->all());

        $product->nuevo = $request->has('nuevo') ? 1 : 0;
        $product->promocion = $request->has('promocion') ? 1 : 0;
        $product->catalogo = $request->has('catalogo') ? 1 : 0;
        $updated = $product->save();

        $message = $updated ? 'Producto actualizado correctamente': 'El producto no se pudo actualizar';
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function destroy(Product $product){
        $deleted = $product->delete();

        $message = $deleted ? 'El producto se elimino correctamente': 'El producto no se pudo eliminar';
        return redirect()->route('admin.product.index')->with('message', $message);
    }

}
