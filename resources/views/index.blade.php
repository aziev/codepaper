@extends ('layout')

@section ('meta')
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ config('app.name') }}">
<meta property="og:description" content="Cтатьи про программирование. Фронтенд, бэкенд, мобильные приложения, карьера.">
<meta property="image" content="{{ URL::asset('img/share/537x240.png') }}"> <!-- VK -->
<meta property="og:image" content="{{ URL::asset('img/share/1200x630.png') }}"> <!-- FB -->
@stop

@section ('content')

@if (Request::has('search'))
    <h1>Результаты поиска по запросу "{{ Request::input('search') }}":</h1>
@endif
@forelse ($articles as $article)
    <article class="article">
        @if (null !== $article->picture)
            <a href='{{ URL::to("article/$article->id") }}'>
                <img src="{{ $article->picture->path }}" alt="">
            </a>
        @endif
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
    </article>
@empty
    <p>К сожалению, по вашему запросу ничего не найдено.</p>
@endforelse

{{ $articles->links() }}

@stop
