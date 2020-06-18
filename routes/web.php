<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('layouts.portada');
});

Route::resource('inicio','InicioController');

Route::resource('categoria', 'CategoriController');
Route::get('api/categorias','CategoriController@data');
Route::get('categoria/estado/{id}', 'CategoriController@estado');
Route::get('categoria/editar/{id}', 'CategoriController@edit');

Route::get('api/usuarios','UserController@data');
Route::get('usuario/editar/{id}', 'UserController@edit');
Route::get('usuario/verusuario/{id}','UserController@verusuario');
Route::get('usuario/estado/{id}', 'UserController@estado');
Route::get('usuario/editarUsuario', 'UserController@editarUsuario');
Route::resource('usuario','UserController');

Route::get('api/productos','ProductosController@data');
Route::get('producto/editar/{id}', 'ProductosController@edit');
Route::get('producto/verproducto/{id}','ProductosController@verproducto');
route::get('producto/material','ProductosController@material'); 
route::get('producto/verprocesos','ProductosController@verprocesos'); 
Route::resource('producto','ProductosController');

Route::get('api/clientes','ClienteController@data');
Route::get('cliente/estado/{id}', 'ClienteController@estado');
Route::get('cliente/editar/{id}', 'ClienteController@edit');
Route::get('cliente/vercliente/{id}','ClienteController@vercliente');
Route::resource('cliente','ClienteController');

Route::get('api/proveedores','ProveedorController@data');
Route::get('proveedor/estado/{id}', 'ProveedorController@estado');
Route::get('proveedor/editar/{id}', 'ProveedorController@edit');
Route::get('proveedor/verproveedor/{id}','ProveedorController@verproveedor');
route::get('proveedor/reviseNit','ProveedorController@reviseNit'); 
Route::resource('proveedor','ProveedorController');

Route::get('api/ingresos','IngresoController@data');
route::get('ingreso/producto/autocompletado','IngresoController@autocomplete'); 
route::get('ingreso/comprobante','IngresoController@comprobante'); 
route::get('ingreso/categoria','IngresoController@categoria'); 
route::get('ingreso/revise_nro','IngresoController@revise_nro'); 
route::get('ingreso/revise_documento','IngresoController@revise_documento'); 
route::get('ingreso/nproveedor','IngresoController@nproveedor'); 
Route::get('ingreso/veringreso/{id}','IngresoController@veringreso');
route::get('ingreso/marca','IngresoController@marca');
Route::resource('ingreso','IngresoController');

Route::get('api/ventas','VentasController@data');
route::get('venta/producto/autocompletado','VentasController@autocomplete'); 
route::get('venta/fechasp','VentasController@fechasp'); 
route::get('venta/fechascp','VentasController@fechascp'); 
route::get('venta/precioprom','VentasController@precioprom'); 
route::get('venta/comprobante','VentasController@comprobante'); 
route::get('venta/ncliente','VentasController@ncliente'); 
Route::get('venta/verVenta/{id}','VentasController@verVenta');
Route::resource('venta','VentasController');

Route::get('reporte/ingreso','ReportesController@ingreso');
Route::get('reporte/ingresos/{id}/{fe}/{fe2}','ReportesController@verIngresos');
Route::get('reporte/venta','ReportesController@venta');
Route::get('reporte/ventas/{id}/{fe}/{fe2}','ReportesController@verVentas');
Route::get('reporte/proveedor','ReportesController@proveedor');
Route::get('reporte/proveedores/{id}/{fe}/{fe2}','ReportesController@verProveedores');
Route::get('reporte/cliente','ReportesController@cliente');
Route::get('reporte/clientes/{id}/{fe}/{fe2}','ReportesController@verClientes');
Route::get('reporte/registro','ReportesController@registros');
Route::get('reporte/regproveedor/{id}/{fe}/{fe2}','ReportesController@regproveedor');
Route::get('reporte/regcliente/{id}/{fe}/{fe2}','ReportesController@regcliente');

Route::get('aviso/cantidad','AvisoController@cantidad');
Route::get('api/cantidad','AvisoController@dataCantidad');
Route::get('aviso/fecha','AvisoController@fecha');
Route::get('api/fecha','AvisoController@dataFecha');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
