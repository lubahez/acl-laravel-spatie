@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Listado de usuarios</h3></div>
	<div class="card-body">
		<div class="text-right">
			<a href="{{ route('usuarios.create') }}" class="btn btn-success">Crear Usuario</a>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Email</th>
	      <th scope="col">Acceso</th>
	      <th scope="col">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@if(count($usuarios) > 0)
		  	@foreach($usuarios as $index => $usuario)
		    <tr>
		      <th scope="row">{{ $index + 1}}</th>
		      <td>{{ $usuario->name }}</td>
		      <td>{{ $usuario->email }}</td>
		      <td>
		      	<a href="{{ url('panel/usuarios/'.$usuario->id.'/roles') }}" class="btn btn-success">Permisos</a>
		      	<a href="{{ url('panel/usuarios/'.$usuario->id.'/roles') }}" class="btn btn-success">Roles</a>
		      </td>
		      <td>
		      	<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
		      </td>
		    </tr>
		    @endforeach
		@else
			<tr>
			  <th scope="row" colspan="4">No hay usuarios creados.</th>
			</tr>
		@endif
	  </tbody>
	</table>
	</div>
</div>
@endsection
