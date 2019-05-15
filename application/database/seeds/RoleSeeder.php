<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Collection::make([
            ['name'=>'SuperAdmin'],
            ['name'=>'Profesor'],
            ['name'=>'Alumno'],
        ])->each(function($item){
            $item['guard_name']='web';
            Role::updateOrCreate(
                ['name'=>$item['name']],
                $item
            );
        });
    }
}
