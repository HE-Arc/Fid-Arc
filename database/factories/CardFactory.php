<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use App\CompanyUser;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(CompanyUser::class, function (Faker $faker) {

    $idsUser = User::role('client')->where('id' ,'>' ,0)->pluck('id')->toArray();
    $idsCompany = Company::where('id' ,'>' ,0)->pluck('id')->toArray();

    return [
        'user_id' => $idsUser[array_rand($idsUser, 1)],
        'company_id' => $idsCompany[array_rand($idsCompany, 1)],
        'number_of_points' => rand(0, 100),
        'is_subscribed_to_emails' => (bool)random_int(0, 1),
    ];
});
