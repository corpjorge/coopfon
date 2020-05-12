<?php

use Illuminate\Database\Seeder;

class GlobalStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'id' => 1,
            'name' => 'Active',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('states')->insert([
            'id' => 2,
            'name' => 'Disabled',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
