<?php

namespace App\Repositories;


interface RespuestaRepositoryInterface
{
    /**
     * Guarda una Respuesta Y la asocia con una tarea
     *
     * @param Tarea $tarea
     * @return Respuesta $respuesta
     */
    public function saveRespuesta($tarea);

    /**
     * Asocia el archivo enviado con la respuesta
     *
     * @param Request $request
     * @param Respuesta $respuesta
     * @return Respuesta $respuestaActualizada
     */
    public function associateFile($request,  $respuesta);
    /**
     * Comprueba Si el fichero es correcto con los parametros
     *
     * @param Respuesta $respuesta
     * @return void
     */
    public function comprobar($respuesta);
}
