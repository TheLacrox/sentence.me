<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Argumento extends Model
{
    protected $fillable=['argumento'];
    protected $table='argumentos';
    public function tarea()
    {
        return $this->belongsTo('App\Tarea');
    }
}
