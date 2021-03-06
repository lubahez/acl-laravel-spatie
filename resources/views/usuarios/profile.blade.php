@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h3>Modificar información de sucursal</h3></div>
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
		<form action="{{ route('sucursales.update', $sucursal->id) }}" method="post">
			@csrf
			@method('PUT')
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre:</label>
		    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" value="{{ $sucursal->nombre }}" placeholder="Escriba nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Descripción: (Opcional)</label>
		    <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" value="{{ $sucursal->descripcion }}" placeholder="Escriba descripción">
		  </div>
		  <div class="text-right">
		  	<button type="submit" class="btn btn-primary">Guardar y crear otro</button>
		  	<button type="submit" class="btn btn-success">Guardar</button>
		  </div>
		</form>
	</div>
</div>
@endsection
