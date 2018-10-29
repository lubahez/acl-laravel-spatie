@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Modificar información de usuario</h3></div>
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
		<form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
			@csrf
			@method('PUT')
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre:</label>
		    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $usuario->name }}" placeholder="Escriba nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email:</label>
		    <input type="text" name="email" class="form-control" id="exampleInputPassword1" value="{{ $usuario->email }}" placeholder="Escriba descripción">
		  </div>
		  <div class="text-right">
		  	<button type="submit" class="btn btn-success">Guardar</button>
		  </div>
		</form>
	</div>
</div>
@endsection
