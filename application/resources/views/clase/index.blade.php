@extends('layouts.principal')

@section('content')
@if (count($clases)>0)
@foreach ($clases as $clase)
<div>{{{$clase->nombre}}}</div>
@endforeach
@else
<div>No tienes clases</div>
@endif
<a href="/clases/create">Crear Clase</a>

@stop

