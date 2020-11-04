@extends('layouts.app')

@section('section-name')
{{$sectionName}}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('companias.update',$compania)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nombre"><b>Nombre compañia</b></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre compañia" value="{{$compania->nombre}}">
                                        @error('nombre')
                                            <span class="text-danger"><i>{{ $message }}</i></span>
                                        @enderror
                                    </div>
                                        
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="correo"><b>Correo electrónico</b></label>
                                        <input type="email" class="form-control" name="correo" id="correo" placeholder="email@dominio.com" value="{{$compania->correo}}">
                                        @error('correo')
                                            <span class="text-danger"><i>{{ $message }}</i></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pagina_web"><b>Página web</b></label>
                                <input type="text" class="form-control col-md-6" id="pagina_web" name="pagina_web" placeholder="Página web compañia; ejemplo https://www.example.com" value="{{$compania->pagina_web}}">
                                @error('pagina_web')
                                    <span class="text-danger"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="logo"><b>Logo Actual</b></label>
                                <div>
                                    @if($compania->logo !== null)
                                        <img src="{{asset($compania->logo)}}" alt="Logo" width="80" height="80">
                                    @else
                                        No tiene logo
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="logo"><b>Cambiar logo</b></label>
                                <input type="file" name="logo" class="form-control-file" id="logo" accept="image/*">
                                @error('logo')
                                    <span class="text-danger"><i>{{ $message }}</i></span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <a href="{{route('companias.show',$compania)}}" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" value="Guardar cambios" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection
