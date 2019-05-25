<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
    public function profesor()
    {
        return $this->belongsTo('App\User');
    }
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
}
