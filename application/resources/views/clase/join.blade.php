@extends('layouts.principal')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Unirse A  Clase') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clases.join') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="clave" class="col-md-4 col-form-label text-md-right">Introduca la Clave</label>

                            <div class="col-md-6">
                                <input id="clave" type="text" class="form-control" name="clave" value="" required autofocus maxlength="16" minlength="16" >
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Unirse') }}
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