@extends('layouts.principal')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6"><a href="{{route('clases.tareas.show',[$claseid,$tareaid])}}" class="btn btn-primary btn-lg" >Volver</a>
                </div>
        <div class="col-12">
            @if(count($respuestas)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Resultado</th>
                    <th scope="col">Fichero</th>
                </tr>
            </thead>
            <tbody>
                @foreach($respuestas as $respuesta)
                <tr>
                    <th scope="row">{{$respuesta->user()->first()->id}}</th>
                    <td>{{$respuesta->user()->first()->name}}</td>
                    <td>
                        @if($respuesta->aprobado==1)
                        <strong>Aprobado</strong>
                        @else
                        <strong>Suspenso</strong>
                        @endif
                    </td>
                    <td><a href="{{route('clases.tareas.respuestas.download',[$claseid,$tareaid,$respuesta->id])}}" class="btn btn-primary btn-lg" role="button">Descargar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1>No tiene Respuestas</h1>
        @endif
        
        </div>
    </div>
</div>

@stop