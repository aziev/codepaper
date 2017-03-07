<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Article;
use App\Tag;
use App\User;
use App\Picture;
use URL;
use Illuminate\Support\Facades\Cache;

class Article extends Model
{
    protected $fillable = ['title', 'text', 'original_url', 'category_id', 'user_id', 'published'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function picture()
    {
        return $this->morphOne(Picture::class, 'picturable');
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

    /**
     * Get host name of the article's original URL
     *
     * @return String
     */
    public function getOriginalHost()
    {
        if (filter_var($this->original_url, FILTER_VALIDATE_URL) === FALSE) {
            return null;
        }

        $parsed = parse_url($this->original_url);
        $host = $parsed['host'];

        return ucfirst($host);
    }

    /**
     * Get related to the article comments count
     *
     * @return integer
     */
    public function getCommentsCount()
    {
        $key = 'article-' . $this->id . '-comments-count';

        if (Cache::has($key))
        {
            return Cache::get($key);
        }

        $api_id = "5784437";
        $api_method = "widgets.getComments";
        $url = URL::to("article/$this->id");

        $api_url = "https://api.vk.com/method/$api_method?url=$url&widget_api_id=$api_id";

        $result = json_decode(file_get_contents($api_url));

        $count = $result->response->count;

        Cache::put($key, $count, 5);

        return $count;
    }
}
