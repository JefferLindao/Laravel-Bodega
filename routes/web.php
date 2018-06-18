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



    Route::get('post','CategoriaController@index');
    Route::POST('addPost','CategoriaController@addPost');
    Route::POST('editPost','CategoriaController@editPost');
    Route::POST('deletePost','CategoriaController@deletePost');



Route::group(['middleware' => 'auth'], function () {
    /*usuarios*/
    Route::get('/listado_usuarios', 'UsuarioController@listado_usuarios');
    Route::post('crear_usuario', 'UsuarioController@crear_usuario');
    Route::post('editar_usuario', 'UsuarioController@editar_usuario');
    Route::post('buscar_usuario', 'UsuarioController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuarioController@borrar_usuario');
    Route::get('form_nuevo_usuario', 'UsuarioController@form_nuevo_usuario');
    Route::get('form_editar_usuario/{id}', 'UsuarioController@form_editar_usuario');
    Route::get('form_borrado_usuario/{idusu}', 'UsuarioController@form_borrado_usuario'); 
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuarioController@confirmacion_borrado_usuario');
    Route::post('editar_acceso', 'UsuarioController@editar_acceso');
    /*roles*/ 
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuarioController@quitar_rol');
    Route::post('crear_rol', 'UsuarioController@crear_rol');
    Route::get('form_nuevo_rol', 'UsuarioController@form_nuevo_rol');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuarioController@asignar_rol');
    Route::get('borrar_rol/{idrol}', 'UsuarioController@borrar_rol');
    /*permisos*/
    Route::get('form_nuevo_permiso', 'UsuarioController@form_nuevo_permiso');
    Route::post('crear_permiso', 'UsuarioController@crear_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuarioController@quitar_permiso');
    Route::post('asignar_permiso', 'UsuarioController@asignar_permiso');

    Route::post('crear_ingreso', 'IngresoController@store');
    Route::get('form_nuevo_ingreso', 'IngresoController@create');
    
    
    // Route::resource('almacen/categoria', 'CategoriaController');
    Route::resource('almacen/articulo', 'ArticuloController');
    Route::resource('compras/proveedor', 'ProveedorController');
    Route::resource('compras/ingreso', 'IngresoController');
    Route::resource('ventas/cliente', 'ClienteController');
    Route::resource('ventas/venta', 'VentaController');

    Route::get('seguridad','SeguridadController@index');
    Route::get('grafica_registros/{anio}/{mes}', 'SeguridadController@registros_mes');
    Route::get('grafica_venta/{anio}/{mes}', 'SeguridadController@registros_venta');

    Route::get('/usuarioPDF', 'PdfController@usuarioPDF');
    Route::get('/categoriaPDF', 'PdfController@categoriaPDF');
    Route::get('/proveedorPDF', 'PdfController@proveedorPDF');
    Route::get('/clientePDF', 'PdfController@clientePDF');
    Route::get('/ingresoPDF', 'PdfController@ingresoPDF');
    Route::get('/articuloPDF', 'PdfController@articuloPDF');
    Route::get('/ventaPDF', 'PdfController@ventaPDF');
    Route::get('/ventas/{venta}', 'PdfController@ventas');
    Route::get('/pedidos/{pedido}', 'PdfController@pedidos');
    Route::get('/kardex/{id}', 'PdfController@kardex');
    Route::get('/programadores', 'SeguridadController@programadores');
    Route::get('/download' , 'SeguridadController@downloadFile');
});
    Route::auth();

