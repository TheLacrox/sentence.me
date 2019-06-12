@extends('layouts.principal')

@section('content')
<div class="container-fluid">
    <div class="row">
        @hasrole('Profesor')
        <div class="col-6">
            <a href="{{route('clases.tareas.edit',[$claseid,$tarea->id])}}" class="btn btn-primary btn-lg w-100" role="button" aria-disabled="true">Editar Tarea</a>
        </div>
        <div class="col-6">
            <a href="{{route('clases.tareas.delete',[$claseid,$tarea->id])}}" class="btn btn-primary btn-lg w-100" role="button" aria-disabled="true">Borrar Tarea</a>
        </div>
        <div class="col-12 text-center">
            <h1>Clave: <span class="badge badge-secondary ">{{$clase->clave}}</span></h1>
        </div>
        @endhasrole
        <div class="col-12 mt-3">
            <div class="card">
                <h5 class="card-header">{{$tarea->nombre}}</h5>
                <div class="card-body">
                    <p>{{{$tarea->descripcion}}}</p>
                    @hasrole('Alumno')
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <i class="fa fa-file" style="font-size: 30px; color: black;"></i>
                            <input type="text" value="{{$filename}}" disabled>
                        </div>
                        <div class="col-12">
                            @if(isset($respuesta))
                            <a href="{{route('clases.tareas.respuestas.edit',[$claseid,$tarea->id,$respuesta->id])}}" class="btn btn-primary btn-lg w-100" role="button" aria-disabled="true">Editar Respuesta</a>
                            @else
                            <a href="{{route('clases.tareas.respuestas.edit',[$claseid,$tarea->id])}}" class="btn btn-primary btn-lg w-100" role="button" aria-disabled="true">Editar Respuesta</a>
                            @endif
                        </div>
                    </div>
                    @endhasrole
                </div>
            </div>
        </div>
    </div>
</div>



@stop