<div class="modal fade" id="update-empleado-{{$empleado->id}}" tabindex="-1" aria-labelledby="updateempleado" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <form action="{{route('empleados.update',$empleado)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="eliminarempleado">Editar datos empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="nombre"><b>Nombres</b></label>
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre empleado" value="{{$empleado->primer_nombre}}">
                @error('nombre')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellidos"><b>Apellidos</b></label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Apellidos empleado" value="{{$empleado->apellido}}"> 
                @error('apellidos')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="correo"><b>Correo electrónico</b></label>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="email@dominio.com" value="{{$empleado->correo}}">
                @error('correo')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefono"><b>Teléfono</b></label>
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Número teléfonico" value="{{$empleado->telefono}}">
                @error('telefono')
                    <span class="text-danger"><i>{{ $message }}</i></span>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-primary" value="Agregar"/>
          </div>
        </form>
      </div>
    </div>
</div>