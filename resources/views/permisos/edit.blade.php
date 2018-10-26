@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Modificar nombre de Rol</h3></div>
	<div class="card-body">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form action="{{ route('permisos.update', $permission->id) }}" method="post">
			@csrf
			@method('PUT')
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre:</label>
		    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" value="{{ $permission->name }}" placeholder="Escriba nombre">
		  </div>
		  <div class="text-right">
		  	<button type="submit" class="btn btn-success">Guardar</button>
		  </div>
		</form>
	</div>
</div>
@endsection
