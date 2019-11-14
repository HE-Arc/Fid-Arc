<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset table for test
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\CardColor::truncate();
        DB::table('roles')->truncate();
        App\User::truncate();
        App\Company::truncate();
        App\CompanyUser::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(CardColorsTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTestSeeder::class);
        $this->call(CompanyUserTableSeeder::class);
    }
}
