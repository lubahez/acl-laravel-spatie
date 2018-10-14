@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Listado de Roles</h3></div>
	<div class="card-body">
		<div class="text-right">
			<a href="{{ route('roles.create') }}" class="btn btn-success">Crear Rol</a>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
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
		      	<a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar</a>
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
