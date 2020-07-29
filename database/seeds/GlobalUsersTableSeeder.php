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
        DB::table('users')->insert([
            'id' => 1,
            'role_id' => 1,
            'name' => 'Administrator',
            'email' => 'corpjorge@hotmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'role_id' => 1,
            'name' => 'John Freddy Moreno',
            'email' => 'john.moreno@fyclsingenieria.com',
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'role_id' => 1,
            'name' => 'Faber Ramirez',
            'email' => 'faber@dgraficos.com',
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'role_id' => 5,
            'name' => 'CorpJorge',
            'email' => 'corpjorge@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'role_id' => 9,
            'name' => 'Material',
            'email' => 'admin@material.com',
            'password' => Hash::make('admin'),
            'document' => '1014205146',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //factory(App\User::class, 10000)->create();
    }
}
