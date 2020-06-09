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
        DB::table('departments')->insert(['code' => 5,  'name' => 'ANTIOQUIA ']);
        DB::table('departments')->insert(['code' => 8,  'name' => 'ATLÁNTICO ']);
        DB::table('departments')->insert(['code' => 9,  'name' => 'BARRANQUILLA D.E']);
        DB::table('departments')->insert(['code' => 11, 'name' => 'SANTA FE DE BOGOTÁ D.C.']);
        DB::table('departments')->insert(['code' => 13, 'name' => 'BOLÍVAR ']);
        DB::table('departments')->insert(['code' => 14, 'name' => 'CARTAGENA D.E.']);
        DB::table('departments')->insert(['code' => 15, 'name' => 'BOYACA ']);
        DB::table('departments')->insert(['code' => 17, 'name' => 'CALDAS ']);
        DB::table('departments')->insert(['code' => 18, 'name' => 'CAQUETÁ ']);
        DB::table('departments')->insert(['code' => 19, 'name' => 'CAUCA ']);
        DB::table('departments')->insert(['code' => 20, 'name' => 'CESAR ']);
        DB::table('departments')->insert(['code' => 23, 'name' => 'CÓRDOVA ']);
        DB::table('departments')->insert(['code' => 25, 'name' => 'CUNDINAMARCA ']);
        DB::table('departments')->insert(['code' => 27, 'name' => 'CHOCÓ ']);
        DB::table('departments')->insert(['code' => 41, 'name' => 'HUILA ']);
        DB::table('departments')->insert(['code' => 44, 'name' => 'LA GUAJIRA']);
        DB::table('departments')->insert(['code' => 47, 'name' => 'MAGDALENA']);
        DB::table('departments')->insert(['code' => 48, 'name' => 'SANTAMARTA D.E']);
        DB::table('departments')->insert(['code' => 50, 'name' => 'META']);
        DB::table('departments')->insert(['code' => 52, 'name' => 'NARIÑO']);
        DB::table('departments')->insert(['code' => 54, 'name' => 'NORTE DE SANTANDER']);
        DB::table('departments')->insert(['code' => 63, 'name' => 'QUINDIO']);
        DB::table('departments')->insert(['code' => 66, 'name' => 'RISARALDA']);
        DB::table('departments')->insert(['code' => 68, 'name' => 'SANTANDER']);
        DB::table('departments')->insert(['code' => 70, 'name' => 'SUCRE']);
        DB::table('departments')->insert(['code' => 73, 'name' => 'TOLIMA']);
        DB::table('departments')->insert(['code' => 76, 'name' => 'VALLE']);
        DB::table('departments')->insert(['code' => 81, 'name' => 'ARAUCA']);
        DB::table('departments')->insert(['code' => 85, 'name' => 'CASANARE']);
        DB::table('departments')->insert(['code' => 86, 'name' => 'PUTUMAYO']);
        DB::table('departments')->insert(['code' => 88, 'name' => 'SAN ANDRÉS']);
        DB::table('departments')->insert(['code' => 91, 'name' => 'AMAZONAS']);
        DB::table('departments')->insert(['code' => 94, 'name' => 'GUAINÍA']);
        DB::table('departments')->insert(['code' => 95, 'name' => 'GUAVIARE']);
        DB::table('departments')->insert(['code' => 97, 'name' => 'VAUPÉS']);
        DB::table('departments')->insert(['code' => 99, 'name' => 'VICHADA']);

    }
}
