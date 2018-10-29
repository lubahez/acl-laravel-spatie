@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Listado de Permisos</h3></div>
	@can('create_permissions')
	<div class="card-body">
		<div class="text-right">
			<a href="{{ route('permisos.create') }}" class="btn btn-success">Crear Permiso</a>
		</div>
	</div>
	@endcan
	<div class="card-body">
		<table class="table table-bordered table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@if(count($permisos) > 0)
		  	@foreach($permisos as $index => $permiso)
		    <tr>
		      <th scope="row">{{ $index + 1}}</th>
		      <td>{{ $permiso->name }}</td>
		      <td>
		      	@can('update_permissions')
		      	<a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-warning">Editar</a>
		      	@endcan
		      </td>
		    </tr>
		    @endforeach
		@else
			<tr>
			  <th scope="row" colspan="4">No hay permisos creados.</th>
			</tr>
		@endif
	  </tbody>
	</table>
	</div>
</div>
@endsection
