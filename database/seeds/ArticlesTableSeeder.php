<?php

use Illuminate\Database\Seeder;

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

        DB::table('articles')->insert([[
        	'title' => 'Разработка на Laravel',
        	'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolorum sit aliquid iusto quis suscipit architecto voluptatem illum, enim deserunt, expedita veritatis veniam, a quos nostrum distinctio quibusdam voluptatum. Quae.',
        	'category_id' => 2,

        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ],[
        	'title' => 'JQuery для чайников',
        	'text' => 'Ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempore odio ea voluptas perspiciatis numquam, voluptate autem unde reprehenderit facere, perferendis qui minus natus non pariatur delectus aliquam consequatur ut!',
        	'category_id' => 1,

        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]]);
    }
}
