<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//dependencias//

  
  Route::bind('available', function($available){
    return App\available::Where('id', $available)->first();
  });
  Route::bind('numbersize', function($numbersize){
    return App\numbersize::Where('id', $numbersize)->first();
  });
  Route::bind('product', function($slug){
    return App\Product::Where('slug', $slug)->first();
  });
  Route::bind('moneda', function($id){
    return App\Moneda::Where('id', $id)->first();
  });
  Route::bind('seguridad', function($id){
    return App\Seguridad::Where('id', $id)->first();
  });
  Route::bind('intentos', function($id){
    return App\intentos::Where('id', $id)->first();
  });
  Route::bind('iva', function($id){
    return App\Iva::Where('id', $id)->first();
  });
  Route::bind('empress', function($id){
    return App\Empressa::Where('id', $id)->first();
  });
  Route::bind('pedido', function($id){
    return App\Pedido::Where('id', $id)->first();
  });  
  Route::bind('Product', function($id){
    return App\Product::Where('id', $id)->first();
  });  
  Route::bind('perfil', function($id){
    return App\client::Where('id', $id)->first();
  });  

  Route::bind('Entiti', function($id){
    return App\Empressa::Where('id', $id)->first();
  });  

  Route::get('/', [
    'as' => 'home',
    'uses' => 'StoreController@index'
    ]);

/*Route::get('/', [
    'as' => 'header',
    'uses' => 'StoreController@getHeader'
    ]);*/

    Route::get('product/{slug}', [
      'as' => 'product-detail',
      'uses' => 'StoreController@showzomm'
      ]);

    Route::get('cat/{id}/{sec}', [
      'as' => 'subcategorias',
      'uses' => 'StoreController@categorys'
      ]);

    Route::get('morecategories/{sec}', [
      'as' => 'morecategories',
      'uses' => 'StoreController@morecategories'
      ]);

    Route::get('new/{sec}', [
      'as' => 'new',
      'uses' => 'StoreController@newproducts'
      ]);

    Route::get('promo/{sec}', [
      'as' => 'promo',
      'uses' => 'StoreController@promoproducts'
      ]);

    Route::get('brandssearch/{brnd}', [
      'as' => 'brandssearch',
      'uses' => 'StoreController@brandssearch'
      ]);

    Route::get('show-zoom/{slug}', [
      'as' => 'show-zoom',
      'uses' => 'StoreController@showzomm'
      ]);

//Cart
    Route::get('cart/show', [
      'middleware' => 'auth',
      'as' => 'cart-show',
      'uses'=>'CarritoController@show'
      ]);

    Route::get('cart/add/{product}', [ 
      'as'=> 'cart-add',
      'uses'=> 'CarritoController@add'
      ]);
    Route::post('cart/add/{product}', [ 
      'as'=> 'cart-add',
      'uses'=> 'CarritoController@add'
      ]);

    Route::get('cart/delete/{product}', [
      'middleware' => 'auth', 
      'as'=> 'cart-delete',
      'uses'=> 'CarritoController@delete'
      ]);

    Route::get('cart/trash', [
      'middleware' => 'auth', 
      'as'=> 'cart-trash',
      'uses'=> 'CarritoController@trash'
      ]);

    Route::post('sales/edit', [
      'middleware' => 'auth', 
      'as'=> 'sales-edit',
      'uses'=> 'SalesController@edit'
      ]);

    Route::get('cart/update/{product}/{cantt}', [
      'middleware' => 'auth', 
      'as' => 'cart-update',
      'uses' => 'CarritoController@update'
      ]);

    Route::get('order-detail/{idus}', [
      'middleware' => 'auth',
      'as' => 'order-detail',
      'uses' => 'CarritoController@orderDetail'
      ]);

    Route::get('confir_comp', [
      'middleware' => 'auth',
      'as' => 'confir_comp',
      'uses' => 'CarritoController@saveOrder'
      ]);

    Route::post('confir_comp', [
      'middleware' => 'auth',
      'as' => 'confir_comp',
      'uses' => 'CarritoController@saveOrder'
      ]);

    Route::bind('Sections', function($seccion){
      return App\Sections::find($seccion);
    });
    Route::bind('category', function($category){
      return App\Category::find($category);
    });
    Route::bind('brand', function($brand){
      return App\Brand::find($brand);
    });
    Route::bind('available', function($available){
      return App\available::find($available);
    });
    Route::bind('size', function($size){
      return App\Size::find($size);
    });
    Route::bind('statu', function($statu){
      return App\Statu::find($statu);
    });
    Route::bind('position', function($position){
      return App\Position::find($position);
    });
    Route::bind('employ', function($employ){
      return App\Employ::find($employ);
    });
    Route::bind('seguridad', function($seguridad){
      return App\Seguridad::find($seguridad);
    });

    Route::get('perfil/{idus}', [
      'middleware' => 'auth', 
      'as'=> 'perfil',
      'uses'=> 'PerfilController@show'
      ]);

    /*cambio de clave*/
    Route::get('password/cambiar', [
      'middleware' => 'auth', 
      'as'=> 'password/cambiar',
      'uses'=> 'PerfilController@changepass'
      ]);
    Route::get('password/update', [
      'middleware' => 'auth', 
      'as'=> 'password/update',
      'uses'=> 'PerfilController@updatepass'
      ]);


    Route::resource('store/perfil','PerfilController');
    Route::resource('store/partials/order-detal','carritoController');
    /*ADMIN*/
    Route::group(['prefix' => 'administracion', 'middleware' => ['auth', 'is_admin']], function(){
      Route::get('/', 'AdminController@index');
    });
    /*inicio*/
    Route::get('inicio', [
      'as'=> 'inicio',
      'uses'=> 'InicioController@index'
      ]);

    Route::resource('contact','ContactController');
    /*contact*/
    Route::get('contact', [
      'as'=> 'contact',
      'uses'=> 'ContactController@index'
      ]);
    /*mis compras*/
    Route::get('mysales', [
      'middleware' => 'auth', 
      'as'=> 'mysales',
      'uses'=> 'MysalesController@index'
      ]);
    Route::get('mysales/{id}', [
      'middleware' => 'auth', 
      'as'=> 'mysalesshow',
      'uses'=> 'MysalesController@show'
      ]);


    Route::get('/api/v1/coordinates/{name}', function($name) {
      try {
        $geocode = Geocoder::geocode("$name, Tanzania")->toArray();
        return Response::json($geocode);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    });

    Route::group(['middleware' => 'auth', 'is_admin'], function()
    {
    //ute::resource('todo', 'TodoController', ['only' => ['index']]);

      Route::resource('admin/category','Admin\CategoryController');
      Route::resource('admin/brand','Admin\BrandController');
      Route::resource('admin/proveedor','Admin\ProveedorController');
      Route::resource('admin/catalogo','Admin\ProductController@catalogoindex');
      Route::resource('admin/product','Admin\ProductController');
      Route::resource('admin/productos','Admin\ProductController');
      Route::resource('admin/status','Admin\EstadosPedidoController');
      Route::resource('admin/department','Admin\DepartmentController');
      Route::resource('admin/position','Admin\CargoController');
      Route::resource('admin/emp','Admin\EmpController');
      Route::resource('admin/entiti','Admin\EmpresaController');
      Route::resource('admin/pay','Admin\PayController');
      Route::resource('admin/sales','Admin\SalesController');
      Route::resource('admin/routes','Admin\RutasController');
      Route::resource('admin/moneda','Admin\MonedaController');
      Route::resource('admin/iva','Admin\IvaController');
      Route::resource('admin/seccion','Admin\SeccionesController');
      Route::resource('admin/size','Admin\SizeController');
      Route::resource('admin/available','Admin\AvailableController');
      Route::resource('admin/numbersize','Admin\numbersizeController');
      Route::resource('admin/productnumbersize','Admin\productnumbersizeController');
      Route::resource('admin/productsize','Admin\productsizeController');
      Route::resource('admin/productavailables','Admin\availableproductController');
//SEGURIDAD//
      Route::resource('admin/seguridad/intentos','Admin\IntentosController');
      Route::resource('admin/seguridad','Admin\ModuloSegController');
      Route::resource('admin/person','Admin\PersonController');



    });


//Route::get('administracion', 'Admin\AdministratorController@showLoginForm');
//Route::post('admins/login', 'Admin\AdministratorController@Login');
//Route::get('admins/area', 'Admin\AdministratorController@secret');
//Route::resource('admin/status','Admin\StsController'); 


    Route::get('routes/{$id}', [
      'as'=> 'routes',
      'uses'=> 'RutasController@show'
      ]);

    Route::auth();

    Route::get('/home', 'StoreController@index');
    Route::get('confirm/comfirm_token/{comfirm_token}/email/{email}', 'Auth\AuthController@confregister');
    Route::get('recupera/comfirm_token/{comfirm_token}/email/{email}', 'Auth\AuthController@recuperaCuenta');
    Route::post('inactive', 'Auth\AuthController@activar');

    Route::get('log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');



// PRUEBAS     firma 
    Route::get('firma/{id}', [
      'as' => 'firma',
      'uses' => 'FirmaController@firma'
      ]);
    //genera xml
    Route::get('xml/', [
      'as' => 'firma',
      'uses' => 'CarritoController@generaclaveacceso'
      ]);

    Route::get('generaxml/{id}', [
      'as' => 'firma',
      'uses' => 'CarritoController@generaXml'
      ]);

    Route::get('firmar/{nombrexml}', [
      'as' => 'firma',
      'uses' => 'CarritoController@firmarXml'
      ]);

    

    Route::any('/server', 'SoapController@demo');

    //cierre pruebas

    

//movimiento de despachador con direction service directions

    Route::get('/hidden', ['before' => 'auth', function(){
      $contents = View::make('hidden');
      $response = Response::make($contents, 200);
      $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
      $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $response->header('Pragma', 'no-cache');
      return $response;
    }]);

    /*DESPACHO*/
    Route::group(['middleware' => 'web'], function(){
      Route::get('person','PersonalController@showLoginForm'); 
      Route::post('person/login','PersonalController@login'); 
      Route::get('person/zone','PersonalController@secret'); 
    });
    /*pruebas*/
    Route::get('lista', [
      'as' => 'lista',
      'uses' => 'PruebasController@index'
      ]);
    Route::get("test-email", function() {
      Mail::send("emails.bienvenido", [], function($message) {
        $message->to("andrescondo17@gmail.com", "christian ")
        ->subject("Bienvenido a Aprendible!");
      });
    });