@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Tarea') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clases.tareas.store',$claseid) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right"> Descripción</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" class="form-control" rows="5" id="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="argumentos" class="col-md-4 col-form-label text-md-right">Argumentos separados por comas</label>

                            <div class="col-md-6">
                                <input id="argumentos" type="text" class="form-control" name="argumentos" value="{{ old('argumentos') }}" placeholder="1,2,3" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="solucion" class="col-md-4 col-form-label text-md-right">solucion</label>

                            <div class="col-md-6">
                                <input id="solucion" type="text" class="form-control" name="solucion" value="{{ old('solucion') }}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
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
