@extends('layouts.principal')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clases.tareas.update',[$claseid,$tarea->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{$tarea->nombre}}" required autocomplete="nombre" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right"> Descripción</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" class="form-control" rows="5" id="descripcion">
                                    {{{$tarea->descripcion}}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
