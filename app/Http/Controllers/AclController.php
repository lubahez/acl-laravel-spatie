<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;

class AclController extends Controller
{
	/**
	 * Roles asignados a un usuario
	 * @param  [int] $id [id de usuario]
	 * @return [type]     [description]
	 */
    public function usuarios_roles($id)
    {
    	$roles 	 = Role::all();
    	$usuario = User::find($id);
    	$usuarioroles = $usuario->roles;

    	return view('usuarios.roles', compact('usuario', 'roles', 'usuarioroles'));
    }

    public function asignar_usuarios_roles(Request $request, $id)
    {
    	$usuario = User::find($id);
    	$roles = $request->input('roles');

    	$usuario->syncRoles($roles);

    	return redirect()->route('usuarios.index')->with(['alert' => true,   'type' => 'success', 'message' => 'Roles de usuario modificados correctamente.']);

    }
}
