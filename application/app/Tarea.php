<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function clase()
    {
        return $this->belongsTo('App\Clase');
    }
    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }
}
