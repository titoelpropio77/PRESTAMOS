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
//USUARIO
Route::get('/',function(){
return view('log.index');
});  

//cliente

Route::resource('cliente', 'ClienteController');
Route::get('listarCliente', 'ClienteController@listarCliente');
Route::get('guarCliente', 'ClienteController@guarCliente');

Route::resource('usuario', 'UsuarioController');
Route::get('index',function(){
return view('index');
});

<<<<<<< HEAD
//gestion Prestamos
Route::resource('Gestionarprestamo','PrestamoController');
Route::get('verificarCarnet/{ci}',"ClienteController@verificarCarnet");

=======

//GESTION DE PRESTAMOS
Route::resource('Gestionarprestamo','PrestamoController');



//PAIS
Route::get('mostrarPais',function(){

$lista=DB::select('select *from pais');
return response()->json($lista);
});
>>>>>>> ad2dc5476323441f3213ba9e34a6003f72195942
