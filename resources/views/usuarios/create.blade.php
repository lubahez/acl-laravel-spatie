@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Crear nuevo usuario</h3></div>
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
		<form action="{{ route('usuarios.store') }}" method="post">
			@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre:</label>
		    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Escriba nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email:</label>
		    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Escriba email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contraseña</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Escriba Contraseña">
		  </div>
		  <div class="text-right">
		  	<button type="submit" class="btn btn-success">Guardar</button>
		  </div>
		</form>
	</div>
</div>
@endsection
