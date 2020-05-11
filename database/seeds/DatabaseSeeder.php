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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::table('item_tag')->truncate();
        DB::table('categories')->truncate();
        DB::table('items')->truncate();

        $this->call([GlobalRolesTableSeeder::class, GlobalStatesTableSeeder::class, GlobalDepartmentsTableSeeder::class, GlobalCityTableSeeder::class]);
        $this->call([GlobalDocumentTypesTableSeeder::class, GlobalGendersTableSeeder::class, GlobalUsersTableSeeder::class]);
        $this->call([GlobalTagsTableSeeder::class, GlobalCategoriesTableSeeder::class, GlobalItemsTableSeeder::class]);
        $this->call([GlobalAdminTableSeeder::class, GlobalModuleTableSeeder::class, GlobalPermissionTableSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
