<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->truncate();

        $faker = Faker::create();

        DB::table('users')->insert([[
            'name' => 'aziev',
            'email' => 'mikail.aziev@gmail.com',
            'password' => bcrypt(123),
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ],[
            'name' => 'teslaAi',
            'email' => 'storona77@gmail.com',
            'password' => bcrypt(123),
            'created_at' => $faker->dateTimeThisMonth(),
            'updated_at' => $faker->dateTimeThisMonth(),
        ]]);
    }
}
