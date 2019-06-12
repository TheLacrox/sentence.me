<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\TareaRepositoryInterface;
use App\Repositories\RespuestaRepositoryInterface;

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
            } else {
                $respuesta = $this->respuesta->getRespuesta($id);
                $respuesta = $this->respuesta->borrarRespuesta($respuesta);
                $respuesta = $this->respuesta->saveRespuesta($tarea);
                $respuesta = $this->respuesta->associateFile($request, $respuesta);
                $this->respuesta->comprobar($respuesta);
            }
        }
    }
}
