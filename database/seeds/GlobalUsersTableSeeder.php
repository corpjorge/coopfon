<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GlobalUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'id' => 1,
            'role_id' => 1,
            'state_id' => 1,
            'name' => 'Admin',
            'email' => 'corpjorge@hotmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        factory(App\User::class)->create([
            'id' => 2,
            'role_id' => 2,
            'state_id' => 1,
            'name' => 'corpjorge',
            'email' => 'corpjorge@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()

        ]);

        factory(App\User::class)->create([
            'id' => 3,
            'role_id' => 9,
            'state_id' => 1,
            'name' => 'Material',
            'email' => 'admin@material.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
