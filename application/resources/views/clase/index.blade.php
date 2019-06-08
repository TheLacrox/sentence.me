@extends('layouts.principal')

@section('content')
@if (count($clases)>0)
@foreach ($clases as $clase)
<a href="{{route('clases.show',$clase->id)}}">{{{$clase->nombre}}}</a><br>
@endforeach
@else
<div>No tienes clases</div>
@endif
<a href="/clases/create">Crear Clase</a>

@stop

