<?php

namespace App\Repositories;


interface TareaRepositoryInterface
{
    /**
     * Coge las tareas de una clase
     *
     * @param Clase $clase
     * @return Array Lista de  Tareas
     */
    public function getTareas($clase);
    /**
     * Crea Una Tarea con los datos del formulario
     *
     * @param Array $formdata
     * @param Int $claseid
     * @return Tarea $tarea
     */
    public function create($formdata, $claseid);
    /**
     * Recupera una tarea Mediante su id
     *
     * @param Int $id
     * @return Tarea $tarea
     */
    public function getTarea($id);
    /**
     * Actualiza una tarea con los datos del request
     *
     * @param Request $formdata
     * @param Int $tareaid
     * @return Tarea $tareaactualizada
     */
    public function update($formdata, $tareaid);

    public function getRespuestas($tareaid);
    public function destroy($tareaid);
}
