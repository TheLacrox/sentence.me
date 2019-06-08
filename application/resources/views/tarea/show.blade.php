@extends('layouts.principal')

@section('content')

<h1>{{{$tarea->nombre}}}</h1>
<div><p>{{{$tarea->descripcion}}}</p></div>
<a href="{{route('clases.tareas.edit',[$claseid,$tarea->id])}}">editar Tarea</a>

@stop
