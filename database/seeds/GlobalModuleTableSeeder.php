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
            'state_id' => '2',
            'name' => 'Servicios',
            'path' => 'service',
            'version' => '2.0.0',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
