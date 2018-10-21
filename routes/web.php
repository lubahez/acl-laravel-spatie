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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('panel')->group(function (){

	Route::get('usuarios/{id}/roles', 'AclController@usuarios_roles');
	Route::put('usuarios/asignar/{id}', 'AclController@asignar_usuarios_roles');
	Route::resource('usuarios', 'UsersController');
	Route::get('roles/{id}/permisos', 'RolPermisosController@show');
	Route::put('roles/asignar/{id}', 'RolPermisosController@asignar');
	Route::resource('roles', 'RolesController');
	Route::resource('permisos', 'PermisosController');

});
