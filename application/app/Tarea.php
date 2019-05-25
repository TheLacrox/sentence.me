<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public function clase()
    {
        return $this->belongsTo('App\Clase');
    }
}
