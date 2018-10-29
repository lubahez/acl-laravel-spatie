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


Route::prefix('panel')->middleware(['auth'])->group(function (){

	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::middleware(['role:admin'])->group(function () {

		Route::get('usuarios/{id}/roles', 'AclController@usuarios_roles');
		Route::get('usuarios/{id}/permisos', 'AclController@usuarios_permisos');
		Route::put('usuarios/asignarroles/{id}', 'AclController@asignar_usuarios_roles');
		Route::put('usuarios/asignarpermisos/{id}', 'AclController@asignar_usuarios_permisos');

		Route::resource('usuarios', 'UsersController');
		Route::get('roles/{id}/permisos', 'RolPermisosController@show');
		Route::put('roles/asignar/{id}', 'RolPermisosController@asignar');
		Route::resource('roles', 'RolesController');
		Route::resource('permisos', 'PermisosController');

	});
});
