<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        */

        $this->call([GlobalRolesTableSeeder::class, GlobalStatesTableSeeder::class, GlobalDepartmentsTableSeeder::class, GlobalCityTableSeeder::class]);
        $this->call([GlobalMemberSeeder::class, GlobalDocumentTypesTableSeeder::class, GlobalGendersTableSeeder::class, GlobalUsersTableSeeder::class]);
        $this->call([GlobalModuleTableSeeder::class, GlobalAuthTableSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
