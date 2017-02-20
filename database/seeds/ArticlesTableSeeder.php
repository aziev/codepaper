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
            'original_url' => $faker->url(),
            'category_id' => 2,
            'user_id' => 1,
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ],[
            'title' => '14 важных показателей производительности сайта, которые вам стоит использовать',
            'text' => $text,
            'original_url' => $faker->url(),
            'category_id' => 2,
            'user_id' => 1,
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ],[
            'title' => 'Еще одна статья',
            'text' => $text,
            'original_url' => $faker->url(),
            'category_id' => 2,
            'user_id' => 1,
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ],[
            'title' => 'JQuery для чайников',
            'text' => $text,
            'original_url' => $faker->url(),
            'category_id' => 1,
            'user_id' => 2,
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ]]);
    }
}
