<?php

use Illuminate\Database\Seeder;

class CardColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_colors')->insert([
            ['color' => 'red'],
            ['color' => 'blue'],
            ['color' => 'green'],
            ['color' => 'yellow'],
            ['color' => 'black'],
            ['color' => 'white']]);
    }
}
