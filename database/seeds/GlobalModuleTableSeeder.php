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
            'view' => 'boleteria',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
