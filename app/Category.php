<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\Category;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

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
