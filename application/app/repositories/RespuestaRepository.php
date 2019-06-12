<?php

namespace App\Repositories;

use App\Respuesta;
use Illuminate\Support\Facades\Auth;


class RespuestaRepository implements RespuestaRepositoryInterface
{
    /**
     * Guarda una Respuesta Y la asocia con una tarea
     *
     * @param Tarea $tarea
     * @return Respuesta $respuesta
     */
    public function saveRespuesta($tarea)
    {
        $respuesta = new Respuesta;
        $respuesta->user()->associate(Auth::user());
        $respuesta->tarea()->associate($tarea)->save();
        return $respuesta;
    }
    /**
     * Asocia el archivo enviado con la respuesta
     *
     * @param Request $request
     * @param Respuesta $respuesta
     * @return Respuesta $respuestaActualizada
     */
    public function associateFile($request, $respuesta)
    {
        $respuesta->addMediaFromRequest('respuesta')->toMediaCollection();
        return $respuesta;
    }

    /**
     * Comprueba Si el fichero es correcto con los parametros
     *
     * @param Respuesta $respuesta
     * @return void
     */
    public function comprobar($respuesta)
    {
        $fichero = $respuesta->getFirstMedia();
        $ubicacion = str_replace($fichero->file_name, '', $fichero->getPath());
        $nombre = $fichero->name;
        $argumentos = '2 4';
        $solucion = '7';
        $resultado = shell_exec('java -cp ' . $ubicacion . ' ' . $nombre . ' ' . $argumentos);
        if ($resultado == $solucion) {
            $respuesta->aprobado = 1;
            $respuesta->save();
        }else{
            $respuesta->aprobado = 0;
            $respuesta->save();
        }
    }
    /**
     * Devuelve La respuesta
     *
     * @param Int $id
     * @return Respuesta $respuesta
     */
    public function getRespuesta($id){
        return $this->find($id);
    }
    /**
     * Busca La respuesta en la db
     *
     * @param Int $id
     * @return Respuesta $respuesta
     */
    public function find($id)
    {
       return Respuesta::find($id);
    }
    public function borrarRespuesta($respuesta){
        $respuesta->getFirstMedia()->delete();
    }
}
