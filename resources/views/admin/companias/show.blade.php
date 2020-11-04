@extends('layouts.app')

@section('section-name')
    @if($compania->logo !== null)
        <img src="{{asset($compania->logo)}}" width="80" height="80"/>
    @endif
    {{$compania->nombre}}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-2"><b>Nombre </b></div>
            <div class="col">{{$compania->nombre}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Correo </b></div>
            <div class="col">{{$compania->correo}}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Página web </b></div>
            <div class="col"><a href="{{$compania->pagina_web}}" target="_blank">{{$compania->pagina_web}}</a></div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <a href="{{route('companias.edit',$compania)}}" class="btn btn-sm btn-secondary">Editar Datos</a>
                <a href="" data-toggle="modal" data-target="#eliminar-compania-{{$compania->id}}" class="btn btn-sm btn-danger">Eliminar</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col card">
                <div class="card-header">
                    <b>Listado de Empleados</b> 
                    <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#agregar-empleado">Agregar Empleado</a>
                </div>  
                <div class="card-body">
                    @include('admin.partials.indexEmpleados')
                </div>
            </div>
        </div>
    </div>
    @include('admin.companias.destroy')
    @include('admin.empleados.store')
@endsection
