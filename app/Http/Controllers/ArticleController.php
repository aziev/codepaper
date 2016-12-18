<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Image;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search'))
        {
            $search = $request['search'];
            $articles = Article::where('title', 'LIKE', "%$search%")->orWhere('text', 'LIKE', "%$search%")->paginate(10);
        }
        else
        {
            $articles = Article::paginate(10);
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
        
        $fields = array_merge($request->only(['title', 'text', 'original_url', 'category_id']), [
            'user_id' => 1,//$request->user->id,
        ]);

        $article = Article::create($fields);

        if ($request->file('image') && $request->file('image')->isValid())
        {
            $image = Image::make($request['image']);

            $path = 'uploads/images/' . date("Y") .'/'. date('m');
            $extension= File::extension($request->file('image')->getClientOriginalName());
            $filename = uniqid() .'.'. $extension;

            if (!is_dir($path)){
                mkdir(public_path($path), 0755, true);
            }

            $path .= '/';

            if ($image->width() > 700*2)
            {
                $image->widen(700*2);
            }

            $image->save($path . $filename);

            $article->picture()->create([
                'path' => $path . $filename,
            ]);
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
        $article = Article::whereId($id)->with('user')->firstOrFail();
        $article->increment('views');

        return view('article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
