<?php

namespace App\Repositories;

use App\Tarea;
use App\Repositories\TareaRepositoryInterface;
use App\Repositories\ClaseRepositoryInterface;
use App\Solucion;
use App\Argumento;

class TareaRepository implements TareaRepositoryInterface
{
    public function __construct(ClaseRepositoryInterface $clase)
    {
        $this->clase = $clase;
    }
    /**
     * Coge las tareas de una clase
     *
     * @param Clase $clase
     * @return Array Lista de  Tareas
     */
    public function getTareas($clase)
    {
        return $clase->tareas()->get();
    }
    /**
     * Crea Una Tarea con los datos del formulario
     *
     * @param Request $request
     * @param Int $claseid
     * @return void
     */
    public function create($formdata, $claseid)
    {
        $tarea = new Tarea;
        $tarea->fill($formdata);
        $tarea->clase()->associate($this->clase->getClase($claseid))->save();
        $solucion = new Solucion;
        $solucion->solucion = $formdata['solucion'];
        $solucion->tarea()->associate($tarea)->save();
        foreach (explode(",", $formdata['argumentos']) as $argumentovalor) {
            $argumento = new Argumento;
            $argumento->argumento = $argumentovalor;
            $argumento->tarea()->associate($tarea)->save();
        }
        return $tarea;
    }
    /**
     * Recupera una tarea Mediante su id
     *
     * @param Int $id
     * @return Tarea $tarea
     */
    public function getTarea($id)
    {
        return $this->find($id);
    }
    /**
     * Recupera una tarea por el id
     *
     * @param Int $id
     * @return Tarea $tarea
     */
    public function find($id)
    {
        return Tarea::find($id);
    }
    /**
     * Actualiza una tarea con los datos del request
     *
     * @param Array $formdata
     * @param Int $tareaid
     * @return Tarea $tareaactualizada
     */
    public function update($formdata, $tareaid)
    {
        $tarea = $this->find($tareaid);
        if ($formdata['argumentos']) {
            foreach ($tarea->argumentos()->get() as $argumenti) {
                $argumenti->delete();
            }
            foreach (explode(",", $formdata['argumentos']) as $argumentovalor) {
                $argumento = new Argumento;
                $argumento->argumento = $argumentovalor;
                $argumento->tarea()->associate($tarea)->save();
            }
        }
        if ($formdata['solucion']) {
            $tarea->solucion()->first()->delete();
            $solucion = new Solucion;
            $solucion->solucion = $formdata['solucion'];
            $solucion->tarea()->associate($tarea)->save();
        }
        $tarea->fill($formdata);
        $tarea->save();
        $this->resetRespuestas($tarea);
        return $tarea;
    }
    public function resetRespuestas($tarea)
    {
        if ($tarea->respuestas()->get()) {
            foreach ($tarea->respuestas()->get() as $respuesta) {
                $respuesta->aprobado = 0;
                $respuesta->save();
            }
        }
    }
    public function getRespuestas($tareaid){
       $tarea=$this->find($tareaid);
       return $tarea->respuestas()->get();
    }
}
