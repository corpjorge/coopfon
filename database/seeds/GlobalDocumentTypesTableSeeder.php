<?php

use Illuminate\Database\Seeder;

class GlobalDocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'id' => 1,
            'type' => 'C.C',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('document_types')->insert([
            'id' => 2,
            'type' => 'C.E',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('document_types')->insert([
            'id' => 3,
            'type' => 'NIT',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
