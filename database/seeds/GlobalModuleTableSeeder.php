<?php

use Illuminate\Database\Seeder;

class GlobalModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'id' => 1,
            'name' => 'Boletería',
            'title' => 'Boletería',
            'route' => 'tickets',
            'icon' =>'Boletería',
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('modules')->insert([
            'id' => 2,
            'name' => 'Votaciones',
            'title' => 'Votaciones',
            'route' => 'votes',
            'icon' => 'votes',
            'order' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
