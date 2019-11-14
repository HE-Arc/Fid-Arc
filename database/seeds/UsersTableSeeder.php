<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    private static $roles = ['client', 'company'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Test user client
        DB::table('users')->where('name', "test")->delete();
        $idClientTest = DB::table('users')->insertGetId([
            'name' => 'test',
            'lastname' => 'Client',
            'email' => 'client@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\User::find($idClientTest)->assignRole('client');

        factory('App\User', 10)->create()->each(function($user){
            $role = array_rand(self::$roles);
            $user->assignRole(self::$roles[$role]);

            if (self::$roles[$role] == "company") {
                factory('App\Company', 1)->create([
                    'user_id' => $user->id
                ]);
            }
        });

    }
}
