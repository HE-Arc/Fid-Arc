<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompaniesTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Test user company
        $idKing = DB::table('users')->insertGetId([
            'name' => 'test',
            'lastname' => 'Company',
            'email' => 'company@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\User::find($idKing)->assignRole('company');

        DB::table('companies')->insert([
            'company_name' => 'King Food',
            'company_description' => 'Nice company with sandwich au poulet',
            'latitude' => 46.997237,
            'longitude' => 6.937594,
            'number_fidelity_points' => 10,
            'message_to_user' => "Adieu pétole",
            'user_id' => $idKing,
            'card_color_id' => 1,
        ]);
    }
}
