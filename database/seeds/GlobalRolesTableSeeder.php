<?php

use Illuminate\Database\Seeder;

class GlobalRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Ultra admin',
            'description' => 'Usuario exclusivo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Super Admin',
            'description' => 'Usuario con los privilegios más elevados',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Admin',
            'description' => 'Este es el rol administrador',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Director',
            'description' => 'Este es el rol director',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'Coordinador',
            'description' => 'Este es el rol coordinador',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'Auxiliar',
            'description' => 'Este es el rol auxiliar',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 7,
            'name' => 'Asistente',
            'description' => 'Este es el rol asistente',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 8,
            'name' => 'Externo',
            'description' => 'Este es el rol para administradores externos',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 9,
            'name' => 'Asociado',
            'description' => 'Este es el rol clientes / asociados',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 10,
            'name' => 'Invitado',
            'description' => 'Este es el rol para invitados',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 11,
            'name' => 'Publico',
            'description' => 'Este es el rol para publicaciones publicas',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
