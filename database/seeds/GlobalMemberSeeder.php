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
            'name' => '{ "F": "Presidenta", "M":"Presidente"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'id' => 2,
            'name' => '{ "F": "Consejera", "M":"Consejero"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('members')->insert([
            'id' => 3,
            'name' => '{ "F": "Delelgada", "M":"Delelgado"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
