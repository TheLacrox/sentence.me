<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'clave'];
    //h
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

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($clase) {
            $clase->Users()->detach();
            $clase->tareas()->delete();
        });
    }
}
