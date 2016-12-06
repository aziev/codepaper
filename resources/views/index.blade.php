@extends ('layout')

@section ('content')

@if (Request::has('search'))
    <h1>Результаты поиска по запросу "{{ Request::input('search') }}":</h1>
@endif
@forelse ($articles as $article)
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
@empty
    <p>К сожалению, по вашему запросу ничего не найдено.</p>
@endforelse

@stop
