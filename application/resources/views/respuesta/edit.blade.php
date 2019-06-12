@extends('layouts.principal')

@section('content')
<form action="{{ route('clases.tareas.respuestas.store',[$claseid,$tareaid,$respuestaid]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="respuesta">Selecciona fichero</label>
            <input type="file" class="form-control-file" id="respuesta" name='respuesta'>
        </div>
        <input type="submit">
</form>

@stop
