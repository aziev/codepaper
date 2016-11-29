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
}
