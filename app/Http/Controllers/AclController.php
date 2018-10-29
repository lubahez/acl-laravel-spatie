<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AclController extends Controller
{
	/**
	 * Vista para asignar Roles a un usuario
	 */
    public function usuarios_roles($id)
    {
    	$roles 	 = Role::all();
    	$usuario = User::find($id);
    	$usuarioroles = $usuario->roles;

    	return view('usuarios.roles', compact('usuario', 'roles', 'usuarioroles'));
    }

    /**
     * Vista para asignar permisos a un usuario
     */

    public function usuarios_permisos($id)
    {
        $permisos   = Permission::all();
        $usuario = User::find($id);
        $usuariopermisos = $usuario->permissions;

        return view('usuarios.permisos', compact('usuario', 'permisos', 'usuariopermisos'));
    }


    public function asignar_usuarios_roles(Request $request, $id)
    {
    	$usuario = User::find($id);
    	$roles = $request->input('roles');

    	$usuario->syncRoles($roles);

    	return redirect()->route('usuarios.index')->with(['alert' => true,   'type' => 'success', 'message' => 'Roles de usuario modificados correctamente.']);

    }

    public function asignar_usuarios_permisos(Request $request, $id)
    {
        $usuario = User::find($id);
        $permisos = $request->input('permisos');

        $usuario->syncPermissions($permisos);

        return redirect()->route('usuarios.index')->with(['alert' => true,   'type' => 'success', 'message' => 'Permisos de usuario concedidos correctamente.']);

    }
}
