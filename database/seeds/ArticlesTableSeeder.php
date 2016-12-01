<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        DB::table('articles')->truncate();

        $faker = Faker::create();

        $text = '';

        foreach ($faker->paragraphs(8) as $paragraph) {
            $text .= '<p>'. $paragraph .'</p>';
        }

        DB::table('articles')->insert([[
        	'title' => 'Разработка на Laravel',
        	'text' => $text,
        	'category_id' => 2,

        	'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ],[
        	'title' => 'JQuery для чайников',
        	'text' => $text,
        	'category_id' => 1,

        	'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ]]);
    }
}
