<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->delete();
        DB::table('pictures')->truncate();

        DB::table('pictures')->insert([[
            'picturable_id' => 1,
            'picturable_type' => 'App\Article',
            'path' => 'http://placehold.it/700x400',
        ],[
            'picturable_id' => 2,
            'picturable_type' => 'App\Article',
            'path' => 'http://placehold.it/700x400/ffd640',
        ]]);
    }
}
