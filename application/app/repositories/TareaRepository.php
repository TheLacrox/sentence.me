<?php

namespace App\Repositories;

use App\Tarea;
use App\Repositories\TareaRepositoryInterface;


class TareaRepository implements TareaRepositoryInterface
{
    public function getTareas($clase)
    {
        return $clase->tareas()->get();
    }
}
