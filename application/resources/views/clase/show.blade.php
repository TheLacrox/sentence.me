@extends('layouts.principal')

@section('content')

<h1>{{{$clase->nombre}}}</h1>
<div><a href="{{ route('clases.tareas.create',$clase->id)}}"> Crear Una nueva Tarea</a></div>
@if (count($tareas)>0)
@foreach ($tareas as $tarea)
<a href="{{route('clases.tareas.show',[$clase->id],$tarea->id)}}">{{{$clase->nombre}}}</a><br>
@endforeach
@else
<div>No tienes clases</div>
@endif

@stop

