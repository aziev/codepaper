@extends ('layout')

@section ('title', $article->title . ' &mdash;')

@section ('content')

<article class="single">
    <h1>{{ $article->title }}</h1>
    <div class="image">
        <img src="http://placehold.it/500x300" alt="">
    </div>
    <div class="text">{!! $article->text !!}</div>
</article>

@stop
