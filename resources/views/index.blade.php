@extends ('layout')

@section ('content')

@if (Request::has('search'))
    <h1>Результаты поиска по запросу "{{ Request::input('search') }}":</h1>
@endif
@forelse ($articles as $article)
    <article class="article">
        <a href='{{ URL::to("article/$article->id") }}'>
            <img src="{{ $article->picture->path }}" alt="">
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
                <i class="fa fa-comments-o" aria-hidden="true"></i>{{ $article->getCommentsCount() }}
            </span>
        </div>
        @foreach ($article->tags as $tag)
            <!-- <span>{{ $tag->title }}</span> -->
        @endforeach
    </article>
@empty
    <p>К сожалению, по вашему запросу ничего не найдено.</p>
@endforelse

{{ $articles->links() }}

@stop
