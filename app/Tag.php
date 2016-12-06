<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Tag extends Model
{
    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }

    /**
     * Get count of articles related to the tag
     *
     * @return integer
     */
    public function getArticlesCount()
    {
        // todo
        return 13;
    }
}
