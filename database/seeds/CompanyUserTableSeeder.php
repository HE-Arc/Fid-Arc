<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class CompanyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = factory('App\CompanyUser', 20)->make();

        // To guaranty unique card
        foreach ($cards as $card) {
            repeat:
            try {
                $card->save();
            } catch (QueryException $e) {
                $card = factory('App\CompanyUser')->make();
                goto repeat;
            }
        }
    }
}
