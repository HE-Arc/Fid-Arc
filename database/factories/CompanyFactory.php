<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Company;
use App\CardColor;
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

$factory->define(Company::class, function (Faker $faker) {

    $idsColor = CardColor::where('id' ,'>' ,0)->pluck('id')->toArray();

    return [
        'company_name' => $faker->company,
        'company_description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'latitude' => $faker->latitude(46.993040, 47.020464),
        'longitude' => $faker->longitude(6.930020, 6.934205),
        'number_fidelity_points' => 10,
        'message_to_user' => "Adieu pétole",
        'card_color_id' => $idsColor[array_rand($idsColor, 1)],
    ];
});
