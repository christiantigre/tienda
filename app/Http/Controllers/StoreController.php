<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product as product;
use App\Empresaa;
use App\Sections;
use App\Category;
use App\brands;
use App\productsize;
use App\availablesproducts;
use App\productsnumbersizes;
use Jleon\LaravelPnotify\Notify;
use Jleon\LaravelPnotify\Notifier;
use Laracasts\Flash\Flash;
use Cache;
use Carbon\Carbon;


class StoreController extends Controller
{
    public function index(){
        if(\Auth::check()){  
            $iduser = \Auth::user()->id;
            $key = Cache::get('key');
            Cache::forever('key','0');
            Cache::flush(); 
            $products = product::orderBy('id', 'desc')->where('catalogo','1')->paginate(6);
            $sections = Sections::orderBy('id','asc')->get();
            //SELECT DISTINCT(brand_id),b.brand,COUNT(brand_id) as cantidad FROM `products` p JOIN 
            //brands b WHERE p.brand_id = b.id group by p.brand_id
            $brands = \DB::table('products')
            ->join('brands', 'products.brand_id','=','brands.id')
            ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
            ->groupBy('brand_id')
            ->get();
            $date = Carbon::now();
            $date->timezone = new \DateTimeZone('America/Guayaquil');
            \DB::table('users')->where('id', $iduser)->update(['actividad' => $date]);
            return view('store.product.index', compact('products','sections','brands'));
        }else{
            $products = product::orderBy('id', 'desc')->where('catalogo','1')->paginate(6);
            $sections = Sections::orderBy('id','asc')->get();            
            $brands = \DB::table('products')
            ->join('brands', 'products.brand_id','=','brands.id')
            ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
            ->groupBy('brand_id')
            ->get();
            $terminos = $this->terminosCondiciones();
            return view('store.product.index', compact('products','sections','brands','terminos'));
        }
    }
    
    public function show($slug)
    {
        $product = product::where('slug', $slug)->first();
        return view('store.product.show', compact('product'));        
    }

    public function getHeader()
    {
        $empress = Empresaa::select()->first();
        return view('store.partials.getheader',compact('empress'));
    }

    public function showzomm($slug)
    {
        $product = product::where('slug', $slug)->first();
        $produ = product::select()->where('slug', '=' , $slug)->get();        
        $nuevos = product::select('nuevo')->where('slug', '=' , $slug)->get(); 
        $promociones = product::select('promocion')->where('slug', '=' , $slug)->get();        
        $sizes = productsize::where('product_id',$product->id)->get();
        $availables = availablesproducts::where('products_id',$product->id)->get();
        $numbers = productsnumbersizes::where('products_id',$product->id)->get();
        return view('store.product.show-zoom',compact('product','sizes','availables','numbers','nuevos','promociones'));
    }    

    public function categorys($id,$sec)
    {
        //$encrypted = \Crypt::encrypt("This is a test");
        $cat = \Crypt::decrypt($id);
        $sect = \Crypt::decrypt($sec);
        $products = product::orderBy('id', 'desc')->where('catalogo','1')->where('category_id',$cat)->where('sections_id',$sect)->paginate(6);
        $secciones = \DB::table('products')
        ->join('sections', 'products.sections_id', '=', 'sections.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('sections.*','products.category_id as categoria')
        ->groupBy('sections_id','category_id')
        ->get();
        $sections = Sections::orderBy('id','asc')->get();        
        $brands = \DB::table('products')
        ->join('brands', 'products.brand_id','=','brands.id')
        ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
        ->groupBy('brand_id')
        ->get();
        return view('store.product.index', compact('products','sections','brands'));
    }

    public function morecategories($sec)
    {
        $sect = \Crypt::decrypt($sec);
        $products = product::orderBy('id', 'desc')->where('catalogo','1')->where('sections_id',$sect)->paginate(6);
        $sections = Sections::orderBy('id','asc')->get();
        $brands = \DB::table('products')
        ->join('brands', 'products.brand_id','=','brands.id')
        ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
        ->groupBy('brand_id')
        ->get();
        return view('store.product.index', compact('products','sections','brands'));
    }

    public function newproducts($sec)
    {
        $sect = \Crypt::decrypt($sec);
        $products = product::orderBy('id', 'desc')->where('catalogo','1')->where('sections_id',$sect)->where('nuevo','1')->paginate(6);
        $sections = Sections::orderBy('id','asc')->get();
        $brands = \DB::table('products')
        ->join('brands', 'products.brand_id','=','brands.id')
        ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
        ->groupBy('brand_id')
        ->get();
        return view('store.product.index', compact('products','sections','brands'));
    }

    public function promoproducts($sec)
    {
        $sect = \Crypt::decrypt($sec);
        $products = product::orderBy('id', 'desc')->where('catalogo','1')->where('sections_id',$sect)->where('promocion','1')->paginate(6);
        $sections = Sections::orderBy('id','asc')->get();        
        $brands = \DB::table('products')
        ->join('brands', 'products.brand_id','=','brands.id')
        ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
        ->groupBy('brand_id')
        ->get();
        return view('store.product.index', compact('products','sections','brands'));
    }

    public function brandssearch($brnd)
    {
        $brnd = \Crypt::decrypt($brnd);
        $products = product::orderBy('id', 'desc')->where('catalogo','1')->where('brand_id',$brnd)->paginate(6);
        $sections = Sections::orderBy('id','asc')->get();        
        $brands = \DB::table('products')
        ->join('brands', 'products.brand_id','=','brands.id')
        ->select(array('brand_id','brands.brand', \DB::raw('COUNT(brand_id) as cantidad')))
        ->groupBy('brand_id')
        ->get();
        return view('store.product.index', compact('products','sections','brands'));
    }

    protected function terminosCondiciones()
    {
            /*$dir = $this->makeDir("terminosCondiciones");
            $file = $this->makeFile();*/
            $termCondts = public_path();
            $termCondts = str_replace("\\", "//", $termCondts);
            $archivo = $termCondts."/terminosCondiciones/terminosycondiciones.txt";
            if (file_exists($archivo)) {
                $rows = file($archivo);
                $test = array_shift($rows);
                foreach ($rows as $row) {
                    $fields = explode("/", $row);
                    //echo "<br/>";
                    $fields = $fields[0] ;
                    return view('store.partials.modal',compact('fields'));
                }
            }else{
                return "No existe";
            }
            
        }

        public function makeDir($nameDir)
        {
            $rutai = public_path();
            $ruta = str_replace("\\", "\\", $rutai);
            $dir = $ruta.'\\'.$nameDir.'';
            if (!file_exists($dir)) {
              mkdir($dir, 0777, true);
          }
          return $dir;
      }

      public function makeFile()
      {
        $termCondts = public_path();
        $termCondts = str_replace("\\", "//", $termCondts);
        $dir = $termCondts."/terminosCondiciones/terminosycondiciones.txt";
        if (!file_exists($dir)) {
          fopen($dir, "a");
      }
      return $dir;
  }


}
