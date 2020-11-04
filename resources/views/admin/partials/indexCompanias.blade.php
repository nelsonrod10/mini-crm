    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Página web</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if ($companias->count() > 0)
                @foreach ($companias as $compania)
                    <tr>
                        <td>{{ $compania->nombre }}</td>
                        <td>{{ $compania->correo }}</td>
                        <td><a href="{{$compania->pagina_web}}" target="_blank">{{$compania->pagina_web}}</a></td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="nav-link" href="" data-toggle="modal" data-target="#eliminar-compania-{{$compania->id}}">
                                        <span data-feather="trash" style="color:red"></span>
                                    </a>
                                    @include('admin.companias.destroy')
                                </div>
                                <div class="col-sm-3">
                                    <a class="nav-link" href="{{route('companias.show',$compania)}}">
                                        <span data-feather="eye" style="color:blue"></span>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="nav-link" href="{{route('companias.edit',$compania)}}">
                                        <span data-feather="edit" style="color:green"></span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr >
                    <td colspan="3">No se ha creado ninguna compañia <a class="btn btn-sm btn-secondary" href="{{ route('companias.create')}}">Crear compañia</a></td>
                </tr>   
            @endif
            
        </tbody>
    </table>
    {{ $companias->links() }}
