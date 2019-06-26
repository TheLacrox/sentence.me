<?php

namespace App\Http\Controllers;

use App\Repositories\RespuestaRepositoryInterface;
use App\Repositories\TareaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RespuestaController extends Controller
{
    public function __construct(TareaRepositoryInterface $tarea, RespuestaRepositoryInterface $respuesta)
    {
        $this->tarea = $tarea;
        $this->respuesta = $respuesta;
    }

    public function edit($claseid, $tareaid, $respuestaid = null)
    {
        if (!Auth::user()->hasRole('Profesor')) {
            return View::make('respuesta.edit', ['claseid' => $claseid, 'tareaid' => $tareaid, 'respuestaid' => $respuestaid]);
        } else {
            return redirect(route('clases.show', $claseid))->with('error', 'No Tienes permitido editar una Tarea');
        }
    }

    public function store(Request $request, $claseid, $tareaid, $id = null)
    {
        if (Auth::user()->hasRole('Alumno')) {
            $tarea = $this->tarea->getTarea($tareaid);
            if ($id === null) {
                $respuesta = $this->respuesta->saveRespuesta($tarea);
                $respuesta = $this->respuesta->associateFile($request, $respuesta);
                $this->respuesta->comprobar($respuesta);
                $request->session()->flash('message', 'Respuesta Subida');

                return redirect(route('clases.tareas.show', [$claseid, $tareaid]));
            } else {
                $respuesta = $this->respuesta->getRespuesta($id);
                $respuesta = $this->respuesta->borrarRespuesta($respuesta);
                $respuesta = $this->respuesta->saveRespuesta($tarea);
                $respuesta = $this->respuesta->associateFile($request, $respuesta);
                $this->respuesta->comprobar($respuesta);
                $request->session()->flash('message', 'Respuesta Actualizada');

                return redirect(route('clases.tareas.show', [$claseid, $tareaid]));
            }
        }
    }

    public function ver($claseid, $tareaid)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $respuestas = $this->tarea->getRespuestas($tareaid);

            return View::make('respuesta.ver', ['respuestas'=>$respuestas, 'claseid'=>$claseid, 'tareaid'=>$tareaid]);
        }
    }

    public function download($claseid, $tareaid, $respuestaid)
    {
        if (Auth::user()->hasRole('Profesor')) {
            $respuesta = $this->respuesta->getRespuesta($respuestaid);
            $media = $respuesta->getFirstMedia();

            return $media;
        }
    }
}
