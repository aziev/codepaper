<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::table('tags')->truncate();

        DB::table('tags')->insert([[
            'title' => 'Laravel',
        ],[
            'title' => 'PHP',
        ],[
            'title' => 'JavaScript',
        ]]);
    }
}
