<?php

use Illuminate\Database\Seeder;

class GlobalAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 1,
            'role_id' => 1,
            'state_id' => 1,
            'name' => 'Admin',
            'email' => 'corpjorge@hotmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('admins')->insert([
            'id' => 2,
            'role_id' => 2,
            'state_id' => 1,
            'name' => 'corpjorge',
            'email' => 'corpjorge@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('admins')->insert([
            'id' => 3,
            'role_id' => 3,
            'state_id' => 1,
            'name' => 'Material',
            'email' => 'admin@material.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}