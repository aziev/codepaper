<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    public function articles()
    {
    	return $this->hasMany(Article::class);
    }

    /**
     * Get count of articles related to the category
     *
     * @return integer
     */
    public function getArticlesCount()
    {
        return $this->articles()->count();
    }
}
