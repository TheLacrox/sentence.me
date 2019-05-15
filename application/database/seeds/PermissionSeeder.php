<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::make([
            ['name'=>'Create Task'],
            ['name'=>'Create Class'],
            ['name'=>'Set Mark'],
        ])->each(function($item){
            $item['guard_name']='web';
            Permission::updateOrCreate(
                ['name'=>$item['name']],
                $item
            );
        });
    }
}
