<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Respuesta extends Model implements HasMedia
{
    protected $fillable=['aprobado'];

    use HasMediaTrait;

    public function tarea()
    {
        return $this->belongsTo('App\Tarea');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
