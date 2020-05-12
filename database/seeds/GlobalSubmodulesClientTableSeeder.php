<?php

use Illuminate\Database\Seeder;

class GlobalSubmodulesClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submodules_clients')->insert([
            'id' => 1,
            'state_id' => 2,
            'module_id' => 2,
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
