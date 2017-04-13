<?php

use App\Tag;
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
        DB::table('tags')->truncate();

        foreach (['Django', 'PHP', 'JavaScript'] as $tag) {
            $tag = Tag::create([
                'title' => $tag,
            ]);

            $tag->articles()->attach(rand(1, 4));
        }
    }
}
