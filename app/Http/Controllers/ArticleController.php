<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Picture;
use App\Category;
use Image;
use Auth;
use Cookie;
// use File;
use URL;
use Route;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $param = null)
    {
        $builder = Article::latest();

        if ($param)
        {
            switch (\Request::segment(1))
            {
                case 'category':
                    $category = Category::whereSlug($param)->firstOrFail(['id']);
                    $builder->where('category_id', $category->id);
                    break;
                case 'tag':
                    $builder->whereHas('tags', function ($query) use ($param) {
                        $query->where('title', $param);
                    });
                    break;
            }
            
        }

        if ($request->has('search'))
        {
            $search = $request['search'];
            $builder->where('title', 'LIKE', "%$search%")->orWhere('text', 'LIKE', "%$search%");
        }
        
        if (Auth::check())
        {
            $articles = $builder->paginate(10);
        }
        else
        {
            $articles = $builder->where('published', 1)->paginate(10);
        }

        return view('index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Article::class);

        return view('admin.article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);
        
        $fields = array_merge($request->only(['title', 'text', 'original_url', 'category_id', 'published']), [
            'user_id' => $request->user()->id,
        ]);

        $article = Article::create($fields);

        if ($request->file('image') && $request->file('image')->isValid())
        {
            $path = Picture::storeFile($request['image']);

            $article->picture()->create([
                'path' => $path,
            ]);
        }

        if (count($request['tags']))
        {
            $article->tags()->attach($request['tags']);
        }

        return redirect("article/$article->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::whereId($id)->with(['user', 'tags'])->firstOrFail();
        $article->increment('views');

        $viewed_articles = Cookie::get('viewed_articles');

        if($viewed_articles)
        {
            array_push($viewed_articles, $id);
            $viewed_articles = array_unique($viewed_articles);
        }
        else
        {
            $viewed_articles[] = $id;
        }

        Cookie::queue('viewed_articles', $viewed_articles);

        $similars = Article::where('category_id', $article->category_id)->whereNotIn('id', $viewed_articles)->take(2)->get();

        return view('article', compact('article', 'similars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Article::class);

        $article = Article::whereId($id)->firstOrFail();
        $action = URL::to("article/$article->id");

        return view('admin.article', compact('article', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Article::class);

        $article = Article::whereId($id)->firstOrFail();

        $article->published = $request->get('published');

        $article->update($request->all());

        if ($request->file('image') && $request->file('image')->isValid())
        {
            $path = Picture::storeFile($request['image']);

            if ($path)
            {
                if (null !== $article->picture)
                {
                    $article->picture->delete();
                }

                $article->picture()->create([
                    'path' => $path,
                ]);
            }
        }

        if (count($request['tags']))
        {
            $article->tags()->sync($request['tags']);
        }
        else
        {
            $article->tags()->detach();
        }

        return redirect("article/$article->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Article::class);

        $article = Article::whereId($id)->firstOrFail();
        $article->delete();

        return redirect("/");
    }
}
