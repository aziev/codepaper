<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use App\Picture;
use File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Article::deleting(function($article){
            if (null !== $article->picture)
            {
                $article->picture->delete();
            }
        });

        Picture::deleting(function($picture){
            File::delete($picture->getOriginal('path'));
            File::delete($picture->getPath('vk'));
            File::delete($picture->getPath('fb'));
            File::delete($picture->getPath('2x'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
