    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Compañia</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if ($empleados->count() > 0)
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->primer_nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>{{ $empleado->telefono}}</td>
                        <td><a href="{{route('companias.show',$empleado->compania)}}">{{ $empleado->compania->nombre}}</a></td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="nav-link" href="" data-toggle="modal" data-target="#eliminar-empleado-{{$empleado->id}}">
                                        <span data-feather="trash" style="color:red"></span>
                                    </a>
                                    @include('admin.empleados.destroy')
                                </div>
                                <div class="col-sm-3">
                                    <a class="nav-link" href="" data-toggle="modal" data-target="#update-empleado-{{$empleado->id}}">
                                        <span data-feather="edit" style="color:green"></span>
                                    </a>
                                    @include('admin.empleados.update')
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr >
                    <td colspan="3">No existen empleados.</td>
                </tr>   
            @endif
            
        </tbody>
    </table>
    {{ $empleados->links() }}
