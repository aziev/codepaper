@extends ('layout')

@section ('title', $article->title . ' &mdash;')

@section ('content')

<article class="single">
    <h1>{{ $article->title }}</h1>
    <div class="info">
        <span class="date">{{ $article->getDate() }}</span>
        <span class="views">
            <i class="fa fa-eye" aria-hidden="true"></i>{{ $article->views }}
        </span>
        <span class="comments">
            <i class="fa fa-comments-o" aria-hidden="true"></i>20
        </span>
    </div>
    <div class="image">
        <img src="http://placehold.it/700x400" alt="">
    </div>
    <div class="text">{!! $article->text !!}</div>
</article>

@stop
