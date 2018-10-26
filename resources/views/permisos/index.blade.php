@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Listado de Permisos</h3></div>
	<div class="card-body">
		<div class="text-right">
			<a href="{{ route('permisos.create') }}" class="btn btn-success">Crear Permiso</a>
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
	  	@if(count($permisos) > 0)
		  	@foreach($permisos as $index => $permiso)
		    <tr>
		      <th scope="row">{{ $index + 1}}</th>
		      <td>{{ $permiso->name }}</td>
		      <td>
		      	<a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-warning">Editar</a>
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
