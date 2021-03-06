<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|Agregar estas lineas en el servidor
 * * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
 */

//dependencias//

Route::bind('available', function ($available) {
    return App\available::Where('id', $available)->first();
});
Route::bind('numbersize', function ($numbersize) {
    return App\numbersize::Where('id', $numbersize)->first();
});
Route::bind('product', function ($slug) {
    return App\Product::Where('slug', $slug)->first();
});
Route::bind('moneda', function ($id) {
    return App\Moneda::Where('id', $id)->first();
});
Route::bind('seguridad', function ($id) {
    return App\Seguridad::Where('id', $id)->first();
});
Route::bind('intentos', function ($id) {
    return App\intentos::Where('id', $id)->first();
});
Route::bind('iva', function ($id) {
    return App\Iva::Where('id', $id)->first();
});
Route::bind('empress', function ($id) {
    return App\Empressa::Where('id', $id)->first();
});
Route::bind('pedido', function ($id) {
    return App\Pedido::Where('id', $id)->first();
});
/*Route::bind('Product', function ($id) {
    return App\Product::Where('id', $id)->first();
});*/
Route::bind('perfil', function ($id) {
    return App\client::Where('id', $id)->first();
});
Route::bind('Entiti', function ($id) {
    return App\Empressa::Where('id', $id)->first();
});
Route::get('/', [
    'as'   => 'home',
    'uses' => 'StoreController@index']);

Route::get('product/{slug}', [
    'as'   => 'product-detail',
    'uses' => 'StoreController@showzomm']);

Route::get('cat/{id}/{sec}', [
    'as'   => 'subcategorias',
    'uses' => 'StoreController@categorys']);

Route::get('morecategories/{sec}', [
    'as'   => 'morecategories',
    'uses' => 'StoreController@morecategories']);

Route::get('new/{sec}', [
    'as'   => 'new',
    'uses' => 'StoreController@newproducts']);

Route::get('promo/{sec}', [
    'as'   => 'promo',
    'uses' => 'StoreController@promoproducts']);

Route::get('brandssearch/{brnd}', [
    'as'   => 'brandssearch',
    'uses' => 'StoreController@brandssearch']);

Route::get('show-zoom/{slug}', [
    'as'   => 'show-zoom',
    'uses' => 'StoreController@showzomm']);

//Cart
Route::get('cart/show', [
    'middleware' => 'auth',
    'as'         => 'cart-show',
    'uses'       => 'CarritoController@show']);

Route::get('cart/add/{product}', [
    'as'   => 'cart-add',
    'uses' => 'CarritoController@add']);

Route::post('cart/add/{product}', [
    'as'   => 'cart-add',
    'uses' => 'CarritoController@add']);

Route::get('cart/delete/{product}', [
    'middleware' => 'auth',
    'as'         => 'cart-delete',
    'uses'       => 'CarritoController@delete']);

Route::get('cart/trash', [
    'middleware' => 'auth',
    'as'         => 'cart-trash',
    'uses'       => 'CarritoController@trash']);

Route::get('factura/{factura}', [
    'middleware' => 'auth',
    'as'         => 'admin.sales.factura',
    'uses'       => 'Admin\SalesController@factura']);

Route::get('sendxml/{factura}', [
    'middleware' => 'auth',
    'as'         => 'admin.sales.sendxml',
    'uses'       => 'Admin\SalesController@sendxml']);

Route::get('sendpdf/{factura}', [
    'middleware' => 'auth',
    'as'         => 'admin.sales.sendpdf',
    'uses'       => 'Admin\SalesController@sendpdf']);

Route::get('Genfiles/{factura}', [
    'middleware' => 'auth',
    'as'         => 'admin.sales.convrtride',
    'uses'       => 'Admin\SalesController@revisarXml']);

Route::get('generaArchivos/{factura}', [
    'middleware' => 'auth',
    'as'         => 'admin.sales.generaarchivos',
    'uses'       => 'Admin\SalesController@generaArchivos']);

Route::get('cart/update/{product}/{cantt}', [
    'middleware' => 'auth',
    'as'         => 'cart-update',
    'uses'       => 'CarritoController@update']);

Route::get('order-detail/{idus}', [
    'middleware' => 'auth',
    'as'         => 'order-detail',
    'uses'       => 'CarritoController@orderDetail']);

Route::get('confir_comp', [
    'middleware' => 'auth',
    'as'         => 'confir_comp',
    'uses'       => 'CarritoController@saveOrder']);

Route::post('confir_comp', [
    'middleware' => 'auth',
    'as'         => 'confir_comp',
    'uses'       => 'CarritoController@saveOrder']);

Route::bind('Sections', function ($seccion) {
    return App\Sections::find($seccion);
});
Route::bind('category', function ($category) {
    return App\Category::find($category);
});
Route::bind('brand', function ($brand) {
    return App\Brand::find($brand);
});
Route::bind('available', function ($available) {
    return App\available::find($available);
});
Route::bind('size', function ($size) {
    return App\Size::find($size);
});
Route::bind('statu', function ($statu) {
    return App\Statu::find($statu);
});
Route::bind('position', function ($position) {
    return App\Position::find($position);
});
Route::bind('employ', function ($employ) {
    return App\Employ::find($employ);
});
Route::bind('seguridad', function ($seguridad) {
    return App\Seguridad::find($seguridad);
});

Route::get('perfil/{idus}', [
    'middleware' => 'auth',
    'as'         => 'perfil',
    'uses'       => 'PerfilController@show']);

/*cambio de clave*/
Route::get('password/cambiar', [
    'middleware' => 'auth',
    'as'         => 'password/cambiar',
    'uses'       => 'PerfilController@changepass']);

Route::get('password/update', [
    'middleware' => 'auth',
    'as'         => 'password/update',
    'uses'       => 'PerfilController@updatepass']);

Route::resource('store/perfil', 'PerfilController');
Route::resource('store/partials/order-detal', 'carritoController');
/*ADMIN*/
Route::group(['prefix' => 'administracion', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/', 'AdminController@index');
});

Route::get('adminindex', [
    'middleware' => ['auth', 'is_admin'],
    'as'         => 'admin.adminindex',
    'uses'       => 'AdminController@index']);
/*inicio*/
Route::get('inicio', [
    'as'   => 'inicio',
    'uses' => 'InicioController@index']);

Route::resource('contact', 'ContactController');
/*contact*/
Route::get('contact', [
    'as'   => 'contact',
    'uses' => 'ContactController@index']);
/*mis compras*/
Route::get('mysales', [
    'middleware' => 'auth',
    'as'         => 'mysales',
    'uses'       => 'MysalesController@index']);
Route::get('mysales/{id}', [
    'middleware' => 'auth',
    'as'         => 'mysalesshow',
    'uses'       => 'MysalesController@show']);
/*FACTURAS*/

Route::get('buscar/', [
    'middleware' => 'auth',
    'as'         => 'admin.facturas.searh',
    'uses'       => 'Admin\factureController@search']);

Route::post('buscar/', [
    'middleware' => 'auth',
    'as'         => 'admin.facturas.buscar',
    'uses'       => 'Admin\factureController@buscar']);

Route::get('/api/v1/coordinates/{name}', function ($name) {
    try {
        $geocode = Geocoder::geocode("$name, Tanzania")->toArray();
        return Response::json($geocode);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
});

Route::group(['middleware' => 'auth', 'is_admin'], function () {
    Route::resource('admin/category', 'Admin\CategoryController');
    Route::resource('admin/brand', 'Admin\BrandController');
    Route::resource('admin/proveedor', 'Admin\ProveedorController');
    Route::resource('admin/catalogo', 'Admin\ProductController@catalogoindex');
    Route::resource('admin/product', 'Admin\ProductController');
    Route::resource('admin/productos', 'Admin\ProductController');
    Route::resource('admin/status', 'Admin\EstadosPedidoController');
    Route::resource('admin/department', 'Admin\DepartmentController');
    Route::resource('admin/position', 'Admin\CargoController');
    Route::resource('admin/emp', 'Admin\EmpController');
    Route::resource('admin/entiti', 'Admin\EmpresaController');
    Route::resource('admin/pay', 'Admin\PayController');
    Route::resource('admin/sales', 'Admin\SalesController');
    Route::resource('admin/routes', 'Admin\RutasController');
    Route::resource('admin/moneda', 'Admin\MonedaController');
    Route::resource('admin/iva', 'Admin\IvaController');
    Route::resource('admin/seccion', 'Admin\SeccionesController');
    Route::resource('admin/size', 'Admin\SizeController');
    Route::resource('admin/available', 'Admin\AvailableController');
    Route::resource('admin/numbersize', 'Admin\numbersizeController');
    Route::resource('admin/productnumbersize', 'Admin\productnumbersizeController');
    Route::resource('admin/productsize', 'Admin\productsizeController');
    Route::resource('admin/productavailables', 'Admin\availableproductController');
    //SEGURIDAD//
    Route::resource('admin/seguridad/intentos', 'Admin\IntentosController');
    Route::resource('admin/seguridad', 'Admin\ModuloSegController');
    Route::resource('admin/person', 'Admin\PersonController');
    //PUNTOS DE ENTREGA//
    Route::resource('admin/mapa', 'Admin\MapController');
    Route::resource('admin/despacho', 'Admin\MapController');
    /*FCATURAS*/
    Route::resource('admin/facturas', 'Admin\factureController');
    /*INVENTARIO*/
    Route::resource('admin/inventario', 'Admin\invController@index');
    /*CLIENTES*/
    Route::resource('admin/clients', 'Admin\clientController');
    /*REPORTES*/
    Route::resource('admin/reports/ventas', 'Admin\reportController');
    Route::resource('admin/reports/productos', 'Admin\reportprodController');
    /*mapas*/
    Route::resource('admin/mapas', 'Admin\MapsController');
    /*mails*/
    Route::resource('admin/mails', 'Admin\mailmasivController');
    /*geo*/
    Route::resource('admin/geo', 'Admin\GeolocalizationController');

});


Route::post('/envionotificacion', [
    'middleware' => 'auth',
    'as'         => 'admin.mails.envionotificacion',
    'uses'       => 'Admin\mailmasivController@envionotificacion']);


Route::get('/facturas.download/{pedidoid}', [
    'as'   => 'facturas.download',
    'uses' => 'CarritoController@showFacture']);

Route::post('/registro', [
    'middleware' => 'auth',
    'as'         => 'admin.seguridad.logfecha',
    'uses'       => 'Admin\logsController@revisarLogfecha']);

Route::get('/registros', [
    'middleware' => 'auth',
    'as'         => 'admin.seguridad.log',
    'uses'       => 'Admin\logsController@revisarLogs']);

Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'MapsController@index']);
/*Contactar a proveedor*/

Route::get('contactar/{mail}', [
    'middleware' => 'auth',
    'as'         => 'admin.proveedor.contact',
    'uses'       => 'Admin\ProveedorController@contact']);
Route::post('enviar/', [
    'middleware' => 'auth',
    'as'         => 'admin.proveedor.contactenviar',
    'uses'       => 'Admin\ProveedorController@contactenviar']);
/*BUSCAR PRODUCTO*/

Route::get('searchproduct/', [
    'middleware' => 'auth',
    'as'         => 'admin.product.searchproduct',
    'uses'       => 'Admin\productController@searchproduct']);
Route::post('searchproduct', [
    'as'   => 'admin.product.searchadvance',
    'uses' => 'Admin\productController@searchadvanceproduct']);

/*DESPACHOS*/
Route::get('ruta/', [
    'middleware' => 'auth',
    'as'         => 'admin.despacho.index',
    'uses'       => 'Admin\MapController@showRoute']);

/*INVENTARIO*/
Route::get('imprimir/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.imprimir',
    'uses'       => 'Admin\invController@imprimir']);

Route::get('imprimirvtn/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.imprimirvtn',
    'uses'       => 'Admin\invController@imprimirvtn']);

Route::get('imprimirent/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.imprimirent',
    'uses'       => 'Admin\invController@imprimirent']);

Route::get('download/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.download',
    'uses'       => 'Admin\invController@download']);

Route::get('downloadvtn/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.downloadvtn',
    'uses'       => 'Admin\invController@downloadvtn']);

Route::get('downloadent/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.downloadent',
    'uses'       => 'Admin\invController@downloadent']);

Route::get('excel/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.excel',
    'uses'       => 'Admin\invController@excel']);

Route::get('excelvtn/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.excelvtn',
    'uses'       => 'Admin\invController@excelvtn']);

Route::get('excelent/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.excelent',
    'uses'       => 'Admin\invController@excelent']);

Route::get('invventas/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.invventas',
    'uses'       => 'Admin\invController@invventas']);

Route::get('inentrega/', [
    'middleware' => 'auth',
    'as'         => 'admin.inventario.inentrega',
    'uses'       => 'Admin\invController@inentrega']);

/*TERMINOS Y CONDICIONES*/
Route::get('term/', [
    'as'   => 'term',
    'uses' => 'StoreController@terminosCondiciones']);

/*REPORTES VENTAS*/
Route::post('/reports/rango', [
    'as'   => 'admin.reports.rango',
    'uses' => 'Admin\reportController@rango']);

Route::post('/reports/before', [
    'as'   => 'admin.reports.before',
    'uses' => 'Admin\reportController@before']);

Route::post('/reports/during', [
    'as'   => 'admin.reports.during',
    'uses' => 'Admin\reportController@during']);

Route::post('/reports/after', [
    'as'   => 'admin.reports.after',
    'uses' => 'Admin\reportController@after']);

Route::post('/reportes', [
    'as'   => 'admin.reports.contvcli',
    'uses' => 'Admin\reportController@ventasporclientes']);

Route::post('/ventasdelmes', [
    'as'   => 'admin.reports.contvmes',
    'uses' => 'Admin\reportController@contvmes']);

Route::post('/ventasdelmessuperiores', [
    'as'   => 'admin.reports.contvvalsuprr',
    'uses' => 'Admin\reportController@contvvalsuprr']);

Route::post('/ventasdelmesinferiores', [
    'as'   => 'admin.reports.contvvalinf',
    'uses' => 'Admin\reportController@contvvalinf']);

Route::post('/contadorventasentregangos', [
    'as'   => 'admin.reports.contvvalrangos',
    'uses' => 'Admin\reportController@contvvalrangos']);

/*REPORTES DE PRODUCTOS*/
Route::post('/contadorproductosvendidos', [
    'as'   => 'admin.reports.conctprod',
    'uses' => 'Admin\reportprodController@conctprod']);

Route::post('/contadorproductosvendidospormes', [
    'as'   => 'admin.reports.conctprodmes',
    'uses' => 'Admin\reportprodController@conctprodmes']);

Route::post('/contadorproductosvendidoshoy', [
    'as'   => 'admin.reports.conctproddia',
    'uses' => 'Admin\reportprodController@conctproddia']);

Route::post('/contadorproductossuperiores', [
    'as'   => 'admin.reports.superior',
    'uses' => 'Admin\reportprodController@superiores']);

Route::post('/contadorproductosinferiores', [
    'as'   => 'admin.reports.inferior',
    'uses' => 'Admin\reportprodController@inferiores']);

Route::post('/contadorprodentregangos', [
    'as'   => 'admin.reports.contprodcantrangos',
    'uses' => 'Admin\reportprodController@contprodcantrangos']);

Route::auth();

Route::get('/home', 'StoreController@index');
Route::get('confirm/comfirm_token/{comfirm_token}/email/{email}', 'Auth\AuthController@confregister');
Route::get('recupera/comfirm_token/{comfirm_token}/email/{email}', 'Auth\AuthController@recuperaCuenta');
Route::post('inactive', 'Auth\AuthController@activar');

Route::get('log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// PRUEBAS     firma
/*reportes de productos*/
Route::get('bb', [
    'as'   => 'bb',
    'uses' => 'Admin\BachupController@index']);

Route::get('conctprod', [
    'as'   => 'conctprod',
    'uses' => 'Admin\reportprodController@conctprod']);

Route::get('admin/inv/', [
    'as'   => 'inv',
    'uses' => 'Admin\invController@index']);

Route::get('gen/', [
    'as'   => 'gen',
    'uses' => 'Admin\logsController@genLog']);

Route::get('file/{dir}', [
    'as'   => 'file',
    'uses' => 'CarritoController@makeDir']);

Route::get('deleteFile/{directorio}/{archivoconextencion}', [
    'as'   => 'deleteFile',
    'uses' => 'CarritoController@deleteFile']);

Route::get('firma/{id}', [
    'as'   => 'firma',
    'uses' => 'FirmaController@firma']);
//genera xml
Route::get('generaFiles/{id}', [
    'as'   => 'generaFiles',
    'uses' => 'Admin\SalesController@generaArchivos']);

Route::get('xml/', [
    'as'   => 'firma',
    'uses' => 'CarritoController@generaclaveacceso']);

Route::get('sendEmail/{clavedeacceso}', [
    'as'   => 'sendEmail',
    'uses' => 'CarritoController@sendEmail']);

Route::get('generaxml/{id}', [
    'as'   => 'firma',
    'uses' => 'CarritoController@generaXml']);

Route::get('firmar/{nombrexml}', [
    'as'   => 'firma',
    'uses' => 'CarritoController@firmarXml']);

Route::get('revisar/{var}', [
    'as'   => 'revisar',
    'uses' => 'CarritoController@revisarXml']);
/*funciona hasta 12/09/2017*/
Route::get('frmxml/{claveacceso}', [
    'as'   => 'revisar',
    'uses' => 'Admin\SalesController@firmarXml']);


Route::get('existFile/{var}', [
    'as'   => 'revisar',
    'uses' => 'CarritoController@existFile']);

Route::get('generapdf/{clave}', [
    'as'   => 'generapdf',
    'uses' => 'CarritoController@generaPdf']);

Route::get('redis', function () {
    $redis = app()->make('redis');
    $redis->set("key1", "testValue");
    return $redis->get("key1");
});

Route::get('vista', function () {
    return View::make('pdf/vista');
});

Route::get('artisan', function () {
    Artisan::call('log:ride');
});

Route::any('/server', 'SoapController@demo');

//cierre pruebas

//movimiento de despachador con direction service directions

Route::get('/hidden', ['before' => 'auth', function () {
    $contents = View::make('hidden');
    $response = Response::make($contents, 200);
    $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
    $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $response->header('Pragma', 'no-cache');
    return $response;
}]);

/*No funciona*/
//Route::group(['middleware' => 'iddesp'], function(){
Route::get('person', 'PersonalController@showLoginForm');
Route::post('person/login', 'PersonalController@postLogin');
Route::get('person/zone', 'PersonalController@secret');
/*No funciona*/
//});

/*pruebasD7ukZ_44NGlrH1xhjaFrrQ*/
Route::get('lista', [
    'as'   => 'lista',
    'uses' => 'PruebasController@index']);

Route::get("test-email", function () {
    Mail::send("emails.bienvenido", [], function ($message) {
        $message->to("andrescondo17@gmail.com", "christian ")
            ->subject("Mensaje de prueba!");
        $rutaPdf = "C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\enviados\\2110201601010511850900110010010000003005723471412.pdf";
        //$rutaXml="C:\\xampp\\htdocs\\repositoriotesis\\tesis\\tienla\\public\\archivos\\autorizados\\0610201601010511850900110010010000002245597759319.xml";
        //$message->attach($rutaXml);
        $message->attach($rutaPdf);
    });
});
//  Muestra los paths de los archivos generados despues de generar la venta de productos.
Route::get('pathFiles/{pedido_id}', 'CarritoController@mostrarRutasArchivosGenerados');
// realiza el envio de comprobantes para la autorizacion pasandole como parametro la clave de acceso del archivo firmado
Route::get('autorizar/{claveAcceso}', 'SriController@enviarAutorizar');
