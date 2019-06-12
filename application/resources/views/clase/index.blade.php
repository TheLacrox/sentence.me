@extends('layouts.principal')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @hasrole('Profesor')
            <a href="{{route('clases.create')}}" class="btn btn-primary btn-lg w-100"  role="button" aria-disabled="true">Crear Clase</a>
            @else
            <a href="{{route('clases.getin')}}" class="btn btn-primary btn-lg w-100"  role="button" aria-disabled="true">Unirse A Clase</a>
            @endhasrole
        </div>
        <div class="col-12 mt-3">
            <div class="card">
            <h5 class="card-header">Clases</h5>
            <div class="card-body">
            @if (count($clases)>0)
                @foreach ($clases as $clase)
                    <div class="card">
                    <h5 class="card-header">{{$clase->nombre}}</h5>
                        <div class="card-body">
                            <p>{{$clase->descripcion}}</p>
                            <a href="{{route('clases.show',$clase->id)}}" class="btn btn-primary">Ver Clase</a> 
                        </div>
                    </div>
                @endforeach
            @else
                <p>No tienes Ninguna Clase</p>
            @endif
            </div>
            </div>
        </div>
    </div>
</div>
@stop

