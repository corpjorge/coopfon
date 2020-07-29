<?php

use Illuminate\Database\Seeder;

class GlobalAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auths')->insert([
            'id' => 1,
            'state_id' => 1,
            'name' => 'Documento',
            'path' => 'document',
            'description' => 'Ingresar con documento',
            'icon' => 'fa fa-credit-card',
            'fields' => '{ "document", "password"}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('auths')->insert([
            'id' => 2,
            'state_id' => 1,
            'name' => 'Facebook',
            'path' => 'facebook',
            'description' => 'Ingresar con Facebook',
            'icon' => 'fa fa-facebook-square',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('auths')->insert([
            'id' => 3,
            'state_id' => 1,
            'name' => 'Google',
            'path' => 'google',
            'description' => 'Ingresar con Gmail',
            'icon' => 'fa fa-google',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('auths')->insert([
            'id' => 4,
            'state_id' => 2,
            'name' => 'Azure',
            'path' => 'azure',
            'description' => 'Ingresar con SSO',
            'fields' => '{ "email", "password"}',
            'icon' => 'fa fa-windows',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
