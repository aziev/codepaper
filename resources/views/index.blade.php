@extends ('layout')

@section ('content')

<div class="container">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="row">
            @foreach ($articles as $article)
                <article class="article">
                    <a href='{{ URL::to("article/$article->id") }}'>
                        <img src="http://placehold.it/500x300" alt="">
                    </a>
                    <a href='{{ URL::to("article/$article->id") }}' class="title">
                        <h2>{{ $article->title }}</h2>
                    </a>
                    <p>{{ $article->getPreviewText() }}</p>
                    <div class="info">
                        <span class="date">{{ $article->getDate() }}</span>
                        <span class="views">
                            <i class="fa fa-eye" aria-hidden="true"></i>{{ $article->views }}
                        </span>
                        <span class="comments">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>20
                        </span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>

@stop
