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
    return view('auth/login');
});
// Auth::routes();
Route::resource('almacen/categoria', 'CategoriaController');
Route::resource('almacen/articulo', 'ArticuloController');
Route::resource('compras/proveedor', 'ProveedorController');
Route::resource('compras/ingreso', 'IngresoController');
Route::resource('seguridad/usuario', 'UsuarioController');
Route::get('seguridad', function(){
	return view('seguridad/home/index');
});
Route::get('/usuarioPDF', 'PdfController@usuarioPDF');
Route::get('/categoriaPDF', 'PdfController@categoriaPDF');
Route::get('/proveedorPDF', 'PdfController@proveedorPDF');
Route::get('/ingresoPDF', 'PdfController@ingresoPDF');
Route::get('/articuloPDF', 'PdfController@articuloPDF');

Route::auth();
