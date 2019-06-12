<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solucion extends Model
{
    protected $fillable = ['solucion'];
    protected $table = 'soluciones';
    public function tarea()
    {
        return $this->belongsTo('App\Tarea');
    }
}
