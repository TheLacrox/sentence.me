<?php

use App\Clase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::make([
            [
                'nombre'     => 'Clase Jose',
                'descripcion'=> 'Clase Sobre Java Para pruebas',
                'clave'      => str_random('16'),
            ], [
                'nombre'     => 'Clase Alberto',
                'descripcion'=> 'Clase Sobre Php Para pruebas',
                'clave'      => str_random('16'),
            ],
        ])->each(function ($item) {
            $clase = new Clase($item);
            if ($item['nombre'] == 'Clase Jose') {
                $id = 3;
                $clase->user()->associate(User::find($id))->save();
                $clase->Users()->save(User::find(1));
                $clase->Users()->save(User::find(2));
            } else {
                $id = 4;
                $clase->user()->associate(User::find($id))->save();
            }
        });
    }
}
