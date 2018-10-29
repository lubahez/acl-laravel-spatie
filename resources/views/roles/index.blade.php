@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Listado de Roles</h3></div>
	@can('create_roles')<div class="card-body">
		<div class="text-right">
			<a href="{{ route('roles.create') }}" class="btn btn-success">Crear Rol</a>
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
	  	@if(count($roles) > 0)
		  	@foreach($roles as $index => $rol)
		    <tr>
		      <th scope="row">{{ $index + 1}}</th>
		      <td>{{ $rol->name }}</td>
		      <td>
		      	@can('assign_permissions_to_role')
		      		<a href="{{ url('panel/roles/'.$rol->id.'/permisos') }}" class="btn btn-warning">Permisos</a>
		      	@endcan
		      	@can('update_roles')
		      		<a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>
		      	@endcan
		      </td>
		    </tr>
		    @endforeach
		@else
			<tr>
			  <th scope="row" colspan="4">No hay roles creados.</th>
			</tr>
		@endif
	  </tbody>
	</table>
	</div>
</div>
@endsection
