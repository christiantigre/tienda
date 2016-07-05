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


Route::bind('product', function($slug){
  return App\Product::Where('slug', $slug)->first();
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

Route::get('show-zoom/{slug}', [
    'as' => 'show-zoom',
    'uses' => 'StoreController@showzomm'
]);

//Cart
Route::get('cart/show', [
  'as' => 'cart-show',
  'uses'=>'CarritoController@show'
  ]);

Route::get('cart/add/{product}', [
  'as'=> 'cart-add',
  'uses'=> 'CarritoController@add'
  ]);

Route::get('cart/delete/{product}', [
  'as'=> 'cart-delete',
  'uses'=> 'CarritoController@delete'
  ]);

Route::get('cart/trash', [
  'as'=> 'cart-trash',
  'uses'=> 'CarritoController@trash'
  ]);

Route::post('sales/edit', [
  'as'=> 'sales-edit',
  'uses'=> 'SalesController@edit'
  ]);

Route::get('cart/update/{product}/{cantt}', [
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

Route::bind('category', function($category){
  return App\Category::find($category);
});
Route::bind('brand', function($brand){
  return App\Brand::find($brand);
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

Route::get('perfil/{idus}', [
  'as'=> 'perfil',
  'uses'=> 'PerfilController@show'
  ]);

/*cambio de clave*/
Route::get('password/cambiar', [
  'as'=> 'password/cambiar',
  'uses'=> 'PerfilController@changepass'
  ]);
Route::get('password/update', [
  'as'=> 'password/update',
  'uses'=> 'PerfilController@updatepass'
  ]);


Route::resource('store/perfil','PerfilController');
Route::resource('store/partials/order-detal','carritoController');
/*ADMIN*/
Route::group(['prefix' => 'admin/home', 'middleware' => ['auth', 'is_admin']], function(){
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
  'as'=> 'mysales',
  'uses'=> 'MysalesController@index'
  ]);
Route::get('mysales/{id}', [
  'as'=> 'mysalesshow',
  'uses'=> 'MysalesController@show'
  ]);

/*Route::get('admin/home', function(){
  return view('admin/home');
});*/
Route::get('/api/v1/coordinates/{name}', function($name) {
    try {
        $geocode = Geocoder::geocode("$name, Tanzania")->toArray();
        return Response::json($geocode);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
});

Route::resource('admin/category','Admin\CategoryController');
Route::resource('admin/brand','Admin\BrandController');
Route::resource('admin/proveedor','Admin\ProveedorController');
Route::resource('admin/catalogo','Admin\ProductController');
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
//Route::resource('admin/status','Admin\StsController');

Route::get('routes/{$id}', [
  'as'=> 'routes',
  'uses'=> 'RutasController@show'
  ]);

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('confirm/comfirm_token/{comfirm_token}/email/{email}', 'Auth\AuthController@confregister');
Route::post('inactive', 'Auth\AuthController@activar');

Route::get('log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//funcion mail
//Route::resource('mail','MailController');

//PDF//

Route::get('pdf', [
  'as'=> 'pdf',
  'uses'=> 'PdfController@pdf'
  ]);
