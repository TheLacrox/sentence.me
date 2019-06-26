<?php

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
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
                'name'    => 'alumno1',
                'email'   => 'alumno1@gmail.com',
                'password'=> Hash::make('adminadmin'),
            ],
            [
                'name'    => 'alumno2',
                'email'   => 'alumno2@gmail.com',
                'password'=> Hash::make('adminadmin'),
            ],
        ])->each(function ($item) {
            $user = User::updateOrCreate(
                ['email'=>$item['email']],
                $item
            );
            $user->assignRole('Alumno');
        });
        Collection::make([
            [
                'name'    => 'profesor1',
                'email'   => 'profesor1@gmail.com',
                'password'=> Hash::make('adminadmin'),
            ],
            [
                'name'    => 'profesor2',
                'email'   => 'profesor2@gmail.com',
                'password'=> Hash::make('adminadmin'),

            ],
        ])->each(function ($item) {
            $user = User::updateOrCreate(
                ['email'=>$item['email']],
                $item
            );
            $user->assignRole('Profesor');
        });
    }
}
