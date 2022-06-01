<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
Route::get('/usuarios/create', 'UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios/store', 'UsuariosController@store')->name('usuarios.store');
Route::post('/usuarios/destroy/{usu_id}', 'UsuariosController@destroy')->name('usuarios.destroy');

Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/clientes/create', 'ClientesController@create')->name('clientes.create');
Route::post('/clientes/store', 'ClientesController@store')->name('clientes.store');
Route::get('/clientes/edit/{cli_id}', 'ClientesController@edit')->name('clientes.edit');
Route::post('/clientes/update/{cli_id}', 'ClientesController@update')->name('clientes.update');
Route::post('/clientes/destroy/{cli_id}', 'ClientesController@destroy')->name('clientes.destroy');

Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/productos/create', 'ProductosController@create')->name('productos.create');
Route::post('/productos/store', 'ProductosController@store')->name('productos.store');
Route::get('/productos/edit/{pro_id}', 'ProductosController@edit')->name('productos.edit');
Route::post('/productos/update/{pro_id}', 'ProductosController@update')->name('productos.update');
Route::post('/productos/destroy/{pro_id}', 'ProductosController@destroy')->name('productos.destroy');

Route::get('/proveedor', 'ProveedorController@index')->name('proveedor');
Route::get('/proveedor/create', 'ProveedorController@create')->name('proveedor.create');
Route::post('/proveedor/store', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedor/edit/{prov_id}', 'ProveedorController@edit')->name('proveedor.edit');
Route::post('/proveedor/update/{prov_id}', 'ProveedorController@update')->name('proveedor.update');
Route::post('/proveedor/destroy/{prov_id}', 'ProveedorController@destroy')->name('proveedor.destroy');


Route::resource('facturas','FacturasController');
Route::post('/facturas_detalle', 'FacturasController@detalle')->name('facturas_detalle.detalle');
Route::get('/facturas_pdf/{fac_id}', 'FacturasController@facturas_pdf')->name('facturas.pdf');
Route::get('/facturas_anular/{fac_id}', 'FacturasController@facturas_anular')->name('facturas.anular');
Route::post('/facturas/search', 'FacturasController@index')->name('facturas.search');



Route::get('/compania', 'CompaniaController@index')->name('compania');
Route::get('/compania/create', 'CompaniaController@create')->name('compania.create');
Route::post('/compania/store', 'CompaniaController@store')->name('compania.store');
Route::post('/compania/destroy/{comp_id}', 'CompaniaController@destroy')->name('compania.destroy');

