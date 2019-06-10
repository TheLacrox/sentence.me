<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Respuesta;
use App\Tarea;

class RespuestaController extends Controller
{
    public function edit($claseid,$tareaid,$respuestaid=null)
    {
        if (!Auth::user()->hasRole('Profesor')) {
            return View::make('respuesta.edit', ['claseid' => $claseid,'tareaid'=>$tareaid,'respuestaid'=>$respuestaid]);
        } else {
            return redirect(route('clases.show',$claseid))->with('error', 'No Tienes permitido editar una Tarea');
        }
    }
    public function store(Request $request,$claseid,$tareaid)
    {
        if (Auth::user()->hasRole('Alumno')) {
            $tarea=Tarea::find($tareaid);
            $respuesta= new Respuesta;
            $respuesta->user()->associate(Auth::user());
            $respuesta->tarea()->associate($tarea)->save();
            $respuesta->addMediaFromRequest('respuesta')->toMediaCollection();
            dd($respuesta->getFirstMedia()->getPath());

        } else {
            dd('facha');
        }

    }

}
