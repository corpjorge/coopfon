<?php

use Illuminate\Database\Seeder;

class GlobalDepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(['code' => 5,  'name' => 'Antioquia ']);
        DB::table('departments')->insert(['code' => 8,  'name' => 'Atlántico ']);
        DB::table('departments')->insert(['code' => 9,  'name' => 'Barranquilla D.E ']);
        DB::table('departments')->insert(['code' => 11, 'name' => 'Santa Fe de Bogotá D.C. ']);
        DB::table('departments')->insert(['code' => 13, 'name' => 'Bolívar ']);
        DB::table('departments')->insert(['code' => 14, 'name' => 'Cartagena D.E. ']);
        DB::table('departments')->insert(['code' => 15, 'name' => 'Boyaca ']);
        DB::table('departments')->insert(['code' => 17, 'name' => 'Caldas ']);
        DB::table('departments')->insert(['code' => 18, 'name' => 'Caquetá ']);
        DB::table('departments')->insert(['code' => 19, 'name' => 'Cauca ']);
        DB::table('departments')->insert(['code' => 20, 'name' => 'Cesar ']);
        DB::table('departments')->insert(['code' => 23, 'name' => 'Córdova ']);
        DB::table('departments')->insert(['code' => 25, 'name' => 'Cundinamarca ']);
        DB::table('departments')->insert(['code' => 27, 'name' => 'Chocó ']);
        DB::table('departments')->insert(['code' => 41, 'name' => 'Huila ']);
        DB::table('departments')->insert(['code' => 44, 'name' => 'La Guajira ']);
        DB::table('departments')->insert(['code' => 47, 'name' => 'Magdalena ']);
        DB::table('departments')->insert(['code' => 48, 'name' => 'Santamarta D.E ']);
        DB::table('departments')->insert(['code' => 50, 'name' => 'Meta ']);
        DB::table('departments')->insert(['code' => 52, 'name' => 'Nariño ']);
        DB::table('departments')->insert(['code' => 54, 'name' => 'Norte de Santander ']);
        DB::table('departments')->insert(['code' => 63, 'name' => 'Quindio ']);
        DB::table('departments')->insert(['code' => 66, 'name' => 'Risaralda ']);
        DB::table('departments')->insert(['code' => 68, 'name' => 'Santander ']);
        DB::table('departments')->insert(['code' => 70, 'name' => 'Sucre ']);
        DB::table('departments')->insert(['code' => 73, 'name' => 'Tolima ']);
        DB::table('departments')->insert(['code' => 76, 'name' => 'Valle ']);
        DB::table('departments')->insert(['code' => 81, 'name' => 'Arauca ']);
        DB::table('departments')->insert(['code' => 85, 'name' => 'Casanare ']);
        DB::table('departments')->insert(['code' => 86, 'name' => 'Putumayo ']);
        DB::table('departments')->insert(['code' => 88, 'name' => 'San Andrés ']);
        DB::table('departments')->insert(['code' => 91, 'name' => 'Amazonas ']);
        DB::table('departments')->insert(['code' => 94, 'name' => 'Guainía ']);
        DB::table('departments')->insert(['code' => 95, 'name' => 'Guaviare ']);
        DB::table('departments')->insert(['code' => 97, 'name' => 'Vaupés ']);
        DB::table('departments')->insert(['code' => 99, 'name' => 'Vichada ']);

    }
}
