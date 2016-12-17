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
        <span class="link pull-right">
            <i class="fa fa-link" aria-hidden="true"></i>
            <a href="{{ $article->original_url }}" target="_blank" rel="noopener noreferer">{{ $article->getOriginalHost() }}</a>
        </span>
        <span class="author pull-right">
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="https://github.com/{{ $article->user->name }}" target="_blank" rel="noopener noreferer">{{ $article->user->name }}</a>
        </span>
    </div>
    <div class="image">
        <img src="{{ $article->picture->path }}" alt="">
    </div>
    <div class="text">{!! $article->text !!}</div>
</article>

@stop
