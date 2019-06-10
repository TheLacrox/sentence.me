@extends('layouts.principal')

@section('content')

<h1>{{{$tarea->nombre}}}</h1>
<div><p>{{{$tarea->descripcion}}}</p></div>
@hasrole('Profesor')

<a href="{{route('clases.tareas.edit',[$claseid,$tarea->id])}}">editar Tarea</a>

@else
<a href="{{route('clases.tareas.respuestas.edit',[$claseid,$tarea->id])}}">editar Respuesta</a>
@endhasrole
@stop
