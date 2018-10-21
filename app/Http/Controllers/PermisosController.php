<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::all();

        return view('permisos.index', compact('permisos'));
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

        $permission = Permission::create(['name' => $request->input('nombre')]);

        if($permission){
            return redirect()->route('permisos.index')->with(['alert' => true,   'type' => 'success', 'message' => 'Permiso Creado Correctamente.']);

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
        $permission = Permission::find($id);

        return view('permisos.edit', compact('permission'));
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

        $permission = Permission::find($id);
        $permission->name = $request->input('nombre');

        if($permission->save()){
            return redirect()->route('permisos.index')->with(['alert' => true, 'type' => 'success', 'message' => 'Permiso Modificado Correctamente.']);

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
