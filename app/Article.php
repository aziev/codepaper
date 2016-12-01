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
     * Get the previous article's URL
     *
     * @return String
     */
    public function getPrevURL()
    {
        // URL::to(..);
    }

    /**
     * Get the next article's URL
     *
     * @return String
     */
    public function getNextURL()
    {
        // URL::to(..);
    }

}
