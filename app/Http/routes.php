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
Route::resource('cliente', 'ClienteController');

Route::resource('usuario', 'UsuarioController');
Route::get('index',function(){
return view('index');
});


Route::resource('Gestionarprestamo','PrestamoController');
