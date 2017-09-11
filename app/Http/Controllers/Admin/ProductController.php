<?php

namespace App\Http\Controllers\Admin;

use App\available;
use App\availablesproducts;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductoRequest;
use App\Isactive;
use App\numbersize;
use App\Product;
use App\productsize;
use App\productsnumbersizes;
use App\Sections;
use App\Size;
use App\Svlog;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            if (\Auth::user()->is_admin) {
                $products = Product::orderBy('id', 'desc')->paginate(10);
                $this->genLog("Ingresó a gestión productos");
                return view('admin.product.index', compact('products'));
            } else {
                \Auth::logout();
                $this->genLog("No autorizado a gestión productos");
                return redirect('login');
            }
        } else {
            \Auth::logout();
        }
    }

    public function create()
    {
        if (\Auth::check()) {
            if (\Auth::user()->is_admin) {
                $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
                $isactives  = Isactive::orderBy('id', 'asc')->lists('name', 'id');
                $brands     = Brand::orderBy('id', 'asc')->lists('brand', 'id');
                $Secciones  = Sections::orderBy('id', 'asc')->lists('name', 'id');
                $sizes      = Size::all();
                $availables = available::all();
                $numbers    = numbersize::all();
                $this->genLog("Ingresó a nuevo producto");
                return view('admin.product.create', compact('categories', 'isactives', 'brands', 'Secciones', 'sizes', 'availables', 'numbers'));
            } else {
                \Auth::logout();
                $this->genLog("No autorizado en nuevo producto");
                return redirect('login');
            }
        } else {
            \Auth::logout();
        }
    }

    public function store(SaveProductoRequest $request)
    {

        $photo = $request->file('path');
        if (!empty($photo)) {
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            \Image::make($photo)->resize(460, 678)->save(public_path('upload/products/' . $filename));
        } else {
            $filename = 'nophoto.png';
        }

        $data = [
            'nombre'      => $request->get('nombre'),
            'path'        => $filename,
            'slug'        => str_slug($request->get('codbarra')),
            'codbarra'    => $request->get('codbarra'),
            'cant'        => $request->get('cant'),
            'pre_com'     => $request->get('pre_com'),
            'pre_ven'     => $request->get('pre_ven'),
            'img'         => $filename,
            'prgr_tittle' => $request->get('prgr_tittle'),
            'nuevo'       => $request->has('nuevo') ? 1 : 0,
            'promocion'   => $request->has('promocion') ? 1 : 0,
            'catalogo'    => $request->has('catalogo') ? 1 : 0,
            'category_id' => $request->get('category_id'),
            'brand_id'    => $request->get('brand_id'),
            'sections_id' => $request->get('sections_id'),
            'isactive_id' => $request->get('isactive_id'),
        ];

        $product    = Product::create($data);
        $idproducto = $product->id;

        $availablenum = $request["available"];
        $countava     = count($availablenum);
        if ($countava > 0) {
            for ($i = 0; $i < $countava; $i++) {
// echo $numero[$i];
                $datocheckbox = $request["available"] + $availablenum; //dd($datocheckbox);
                \DB::table('availables_products')->insert(
                    ['products_id' => $idproducto, 'availables_id' => $datocheckbox[$i]]);
            }
        }

        $sizenum  = $request["size"];
        $countsiz = count($sizenum);
        if ($countsiz > 0) {
            for ($i = 0; $i < $countsiz; $i++) {
// echo $numero[$i];
                $datochecksize = $request["size"] + $sizenum; //dd($datochecksize);
                \DB::table('product_size')->insert(
                    ['product_id' => $idproducto, 'size_id' => $datochecksize[$i]]);
            }
        }

        $number      = $request["number"];
        $countnumber = count($number);
        if ($countnumber > 0) {
            for ($i = 0; $i < $countnumber; $i++) {
// echo $numero[$i];
                $datochecknumber = $request["number"] + $number; //dd($datochecksize);
                \DB::table('products_numbersizes')->insert(
                    ['products_id' => $idproducto, 'numbersizes_id' => $datochecknumber[$i]]);
            }
        }

        $message = $product ? 'Producto creado correctamente' : 'El producto no se pudo crear';
        $this->genLog("Registro el producto con id " . $idproducto);
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function show($id)
    {
        $product    = Product::findOrFail($id);
        $sizes      = productsize::where('product_id', $product->id)->get();
        $availables = availablesproducts::where('products_id', $product->id)->get();
        $numbers    = productsnumbersizes::where('products_id', $product->id)->get();
        $this->genLog("Visualiso producto " . $product->slug);
        //dd($numbers);
        return view('admin.product.show', compact('product', 'sizes', 'availables', 'numbers'));
    }

    public function edit($id)
    {
        $product     = Product::findOrFail($id);
        $categories  = Category::orderBy('id', 'desc')->lists('name', 'id');
        $isactives   = Isactive::orderBy('id', 'asc')->lists('name', 'id');
        $brands      = Brand::orderBy('id', 'asc')->lists('brand', 'id');
        $Secciones   = Sections::orderBy('id', 'asc')->lists('name', 'id');
        $nsizes      = Size::all();
        $numbersizes = numbersize::all();
        $pavailables = available::all();
        $sizes       = productsize::where('product_id', $product->id)->get();
        $availables  = availablesproducts::where('products_id', $product->id)->get();
        $numbers     = productsnumbersizes::where('products_id', $product->id)->get();
        $this->genLog("Ingresó a editar el producto " . $product->slug);
        return view('admin.product.edit', compact('product', 'categories', 'isactives', 'brands', 'Secciones', 'sizes', 'availables', 'numbers', 'nsizes', 'numbersizes', 'pavailables'));
    }

    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());

        $photo = $request->file('path');
        if (!empty($photo)) {
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            \Image::make($photo)->resize(460, 678)->save(public_path('upload/products/' . $filename));
        } else {
            $filename = $request->get('img');
        }

        $product->nuevo     = $request->has('nuevo') ? 1 : 0;
        $product->promocion = $request->has('promocion') ? 1 : 0;
        $product->catalogo  = $request->has('catalogo') ? 1 : 0;
        $product->path      = $filename;
        $product->img       = $filename;

        $updated = $product->save();
        $message = $updated ? 'Producto actualizado correctamente' : 'El producto no se pudo actualizar';
        $this->genLog("Actualizó el producto " . $product->slug);
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        $message = $deleted ? 'El producto se elimino correctamente' : 'El producto no se pudo eliminar';
        $this->genLog("Eliminó producto " . $product->slug);
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    public function catalogoindex()
    {
        if (\Auth::check()) {
            if (\Auth::user()->is_admin) {
                $products = Product::orderBy('id', 'desc')->where('catalogo', '1')->paginate(12);
                $this->genLog("Ingresó a catalogo de producto");

                return view('admin.product.catalogo', compact('products'));
            } else {
                \Auth::logout();
                $this->genLog("No autorizado en catalogo de productos");

                return redirect('login');
            }
        } else {
            \Auth::logout();
        }
    }

    public function searchproduct()
    {
        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
        $isactives  = Isactive::orderBy('id', 'asc')->lists('name', 'id');
        $brands     = Brand::orderBy('id', 'asc')->lists('brand', 'id');
        $Secciones  = Sections::orderBy('id', 'asc')->lists('name', 'id');
        $sizes      = Size::all();
        $availables = available::all();
        $numbers    = numbersize::all();
        return view('admin.product.search', compact('categories', 'isactives', 'brands', 'Secciones', 'sizes', 'availables', 'numbers'));
    }

    public function searchadvanceproduct(Request $request)
    {
        $product  = new product;
        $products = $product->select()
            ->where('codbarra', '=', $request['codbarra'])
            ->orwhere('nombre', '=', $request['nombre'])
            ->orwhere('pre_ven', '=', $request['pre_ven'])
            ->orwhere('cant', '=', $request['cant'])
            ->get();
        //dd($email);
        if (count($products) > 0) {
            $this->genLog("Realizoó la busqueda de productos");
            return view('admin.product.detallsearch', compact('products'));
            dd($the_product);
        }
    }

    public function genLog($mensaje)
    {
        $area = 'Administracion';
        $logs = Svlog::log($mensaje, $area);
    }

}
