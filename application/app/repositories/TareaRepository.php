<?php

namespace App\Repositories;

use App\Tarea;
use App\Repositories\TareaRepositoryInterface;
use App\Repositories\ClaseRepositoryInterface;

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
        return $tarea;
    }
    /**
     * Recupera una tarea Mediante su id
     *
     * @param Int $id
     * @return Tarea $tarea
     */
    public function getTarea($id){
       return $this->find($id);
    }
    public function find($id)
    {
        return Tarea::find($id);
    }
}
