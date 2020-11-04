<div class="modal fade" id="eliminar-empleado-{{$empleado->id}}" tabindex="-1" aria-labelledby="eliminarempleado" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('empleados.destroy',$empleado)}}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title" id="eliminarempleado">Eliminar {{ $empleado->primer_nombre }} {{ $empleado->apellido }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div><strong>¿Esta seguro de eliminar a {{ $empleado->primer_nombre }} {{ $empleado->apellido }}?</strong></div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <input type="submit" class="btn btn-danger" value="Eliminar"/>
          </div>
        </form>
      </div>
    </div>
</div>