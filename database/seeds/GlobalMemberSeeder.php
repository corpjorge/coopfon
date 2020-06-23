<?php

use Illuminate\Database\Seeder;

class GlobalMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'id' => 1,
            'name' => '{ "F": "Asociada", "M":"Asociado"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'id' => 2,
            'name' => '{ "F": "Delegada", "M":"Delegado"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'id' => 3,
            'name' => '{ "F": "Consejera", "M":"Consejero"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'id' => 4,
            'name' => '{ "F": "Presidenta", "M":"Presidente"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
