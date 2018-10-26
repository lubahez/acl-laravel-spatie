@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><h3>Asignación de permisos del Rol: {{ $role->name }}</h3></div>
    <div class="card-body">
      <p>* Marca para conceder, desmarca para revocar</p>
    </div>
    <div class="card-body">
      <form action="{{ url('panel/roles/asignar/'.$role->id) }}" method="post">
        @csrf
        @method('PUT')
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Concedido</th>
          </tr>
        </thead>
        <tbody>
          @if(count($permisos) > 0)
            @foreach($permisos as $index => $permiso)
              @php $concedido = false; @endphp
              @foreach($rolpermisos as $rpermiso)
                @if($permiso->id == $rpermiso->id)
                  @php $concedido = true; @endphp
                @endif                    
              @endforeach
              <tr>
                <th scope="row">{{ $index + 1}}</th>
                <td>{{ $permiso->name }}</td>
                <td>
                  @if($concedido)
                  <input type="checkbox" name="permisos[]" value="{{ $rpermiso->id }}" checked class="form-control" id="">
                  @else
                      <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}" class="form-control" id="">
                  @endif
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
      <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
</div>
@endsection
