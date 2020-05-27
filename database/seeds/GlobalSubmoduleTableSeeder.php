<?php

use Illuminate\Database\Seeder;

class GlobalSubmoduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submodules')->insert([
            'id' => 1,
            'state_id' => 2,
            'module_id' => 1,
            'role_id' => 1,
            'name' => 'Boletería',
            'title' => 'Boletería',
            'route' => 'tickets',
            'icon' =>'Boletería',
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('submodules')->insert([
            'id' => 2,
            'state_id' => 2,
            'module_id' => 2,
            'role_id' => 9,
            'name' => 'voto',
            'title' => 'voto',
            'route' => 'tickets',
            'icon' =>'Boletería',
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
