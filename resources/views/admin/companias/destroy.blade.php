<div class="modal fade" id="eliminar-compania-{{$compania->id}}" tabindex="-1" aria-labelledby="eliminarCompania" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('companias.destroy',$compania)}}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title" id="eliminarCompania">Eliminar {{$compania->nombre}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <div><strong>¿Esta seguro de eliminar la compañia {{$compania->nombre}}?</strong></div>
              <div class="help-text">Esto eliminará todos los empleados de la compañia</div>    
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