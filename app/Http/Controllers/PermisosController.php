<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('permisos.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('nombre')]);

        if($role){
            return redirect()->route('permisos.index')->with(['alert' => true,   'type' => 'success', 'message' => 'Rol Creado Correctamente.']);

        } else {
            return redirect()->back()->with(['alert' => true,   'type' => 'danger', 'message' => 'Error al guardar, intente de nuevo.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::find($id);

        return view('permisos.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $rol = Role::find($id);
        $rol->name = $request->input('nombre');

        if($rol->save()){
            return redirect()->route('permisos.index')->with(['alert' => true, 'type' => 'success', 'message' => 'Rol Modificado Correctamente.']);

        } else {
            return redirect()->back()->with(['alert' => true, 'type' => 'danger', 'message' => 'Error al modificar, intente de nuevo.']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
