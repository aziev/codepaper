<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

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
        return str_limit($this->text, $length);
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

}
