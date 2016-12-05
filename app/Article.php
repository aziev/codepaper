<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Article;
use URL;

class Article extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    /**
     * Get the article's preview text
     *
     * @param integer $length
     * @return String
     */
    public function getPreviewText($length = 300)
    {
        $stripped = strip_tags($this->text);

        return str_limit($stripped, $length);
    }

    /**
     * Get the article's formatted date
     *
     * @return String
     */
    public function getDate()
    {
        return $this->created_at->format('d.m.Y');
    }

    /**
     * Get prev or next article's URL
     *
     * @param boolean $isPrev
     * @return String | null
     */
    public function getClosestURL($isPrev = true)
    {
    	$prev_article = Article::where('created_at', $isPrev ? '<' : '>', $this->created_at)->latest()->first();

    	if (!$prev_article)
    	{
    		return null;
    	}

    	return URL::to("/article/$prev_article->id");
    }
}
