@extends('layouts.principal')

@section('content')
<div class="container-fluid">
    <div class="row">
        @hasrole('Profesor')
        <div class="col-4">
        <a href="{{route('clases.tareas.create',$clase->id)}}" class="btn btn-primary btn-lg w-100"  role="button" aria-disabled="true">Crear Tarea</a>
        </div>
        <div class="col-4">
        <a href="{{route('clases.edit',$clase->id)}}" class="btn btn-primary btn-lg w-100"  role="button" aria-disabled="true">Editar Clase</a>
        </div>
        <div class="col-4">
        <a href="{{route('clases.delete',$clase->id)}}" class="btn btn-primary btn-lg w-100"  role="button" aria-disabled="true">Borrar Clase</a>
        </div>
        <div class="col-12 text-center">
        <h1>Clave: <span class="badge badge-secondary ">{{$clase->clave}}</span></h1>
        </div>
        @endhasrole
        <div class="col-12 mt-3">
            <div class="card">
            <h5 class="card-header">Tareas</h5>
            <div class="card-body">
            @if (count($tareas)>0)
                @foreach ($tareas as $tarea)
                    <div class="card">
                    <h5 class="card-header">{{{$tarea->nombre}}}</h5>
                        <div class="card-body">
                            <p>{{$tarea->descripcion}}</p>
                            <a href="{{route('clases.tareas.show',[$clase->id,$tarea->id])}}" class="btn btn-primary">Ver Tarea</a> 
                           @hasrole('Profesor') 
                           <a href="{{route('clases.tareas.edit',[$clase->id,$tarea->id])}}" class="btn btn-primary">Editar Tarea</a> 
                           <a href="{{route('clases.tareas.delete',[$clase->id,$tarea->id])}}" class="btn btn-primary">Borrar Tarea</a> 
                           @endhasrole
                        </div>
                    </div>
                @endforeach
            @else
                <p>No tienes Ninguna Tarea</p>
            @endif
            </div>
            </div>
        </div>
        </div>
</div>
@stop

