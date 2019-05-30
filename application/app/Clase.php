<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ['nombre','descripcion'];

    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
}
