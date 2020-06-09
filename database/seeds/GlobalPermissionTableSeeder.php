<?php

use Illuminate\Database\Seeder;

class GlobalPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => 1,
            'user_id' => 1,
            'submodule_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
