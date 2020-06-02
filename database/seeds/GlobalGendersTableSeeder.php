<?php

use Illuminate\Database\Seeder;

class GlobalGendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'id' => 1,
            'abbreviation' => 'F',
            'type' => 'Femenino',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('genders')->insert([
            'id' => 2,
            'abbreviation' => 'M',
            'type' => 'Masculino',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
