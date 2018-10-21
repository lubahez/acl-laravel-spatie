@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><h3>Asignación de Roles de usuario</h3></div>
    <div class="card-body">
      <p>* Marca para asignar, desmarca para eliminar</p>
    </div>
    <div class="card-body">
      <form action="{{ url('panel/usuarios/asignar/'.$usuario->id) }}" method="post">
        @csrf
        @method('PUT')
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Asignado</th>
          </tr>
        </thead>
        <tbody>
          @if(count($roles) > 0)
            @foreach($roles as $index => $role)
              @php $asignado = false; @endphp
              @foreach($usuarioroles as $urole)
                @if($role->id == $urole->id)
                  @php $asignado = true; @endphp
                @endif                    
              @endforeach
              <tr>
                <th scope="row">{{ $index + 1}}</th>
                <td>{{ $role->name }}</td>
                <td>
                  @if($asignado)
                  <input type="checkbox" name="roles[]" value="{{ $urole->id }}" checked class="form-control" id="">
                  @else
                      <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-control" id="">
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
