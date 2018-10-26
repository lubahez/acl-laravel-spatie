<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolPermisosController extends Controller
{
    //
    public function show($id)
    {
    	$permisos = Permission::all();

    	$role = Role::find($id);
    	$rolpermisos = $role->permissions;

    	return view('roles.permisos', compact('role', 'permisos', 'rolpermisos'));
    }

    public function asignar(Request $request, $id)
    {
    	$role = Role::find($id);
    	$permisos = $request->input('permisos');

    	$role->syncPermissions($permisos);

    	return redirect('panel/roles')->with(['alert' => true,   'type' => 'success', 'message' => 'Permisos modificados correctamente.']);

    }
}
