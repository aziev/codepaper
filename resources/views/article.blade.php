@extends ('layout')

@section ('title', $article->title . ' &mdash;')

@section ('meta')
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->getPreviewText() }}">
@if (null !== $article->picture)
    <meta property="image" content="{{ URL::asset($article->picture->getPath('vk')) }}"> <!-- VK -->
    <meta property="og:image" content="{{ URL::asset($article->picture->getPath('fb')) }}"> <!-- FB -->
@endif
@stop

@section ('content')
<article class="single">
    @can('update', $article)
        <a href='{{ URL::to("article/$article->id/edit") }}' class="space-right admin-control-edit">
            <i class="fa fa-pencil" aria-hidden="true"></i>Редактировать
        </a>
    @endcan
    @can('delete', $article)
        <form action='{{ URL::to("article/$article->id") }}' method="POST" class="inline-form admin-control-delete">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button onclick="return confirm('Вы уверены что хотите удалить статью?');">
                <i class="fa fa-trash-o" aria-hidden="true"></i>Удалить
            </button>
        </form>
    @endcan
    @if (null !== $article->picture)
        <div class="image">
            <img src="{{ $article->picture->path }}" alt="">
        </div>
    @endif
    <div class="info">
        <span class="date">{{ $article->getDate() }}</span>
        <span class="views">
            <i class="fa fa-eye" aria-hidden="true"></i>{{ $article->views }}
        </span>
        <span class="comments">
            <i class="fa fa-comments-o" aria-hidden="true"></i>{{ $article->getCommentsCount() }}
        </span>
    </div>
    <h1>{{ $article->title }}</h1>
    <div class="text">
        {!! $article->text !!}
        <p class="text-secondary">Статью перевел <a href="{{ $article->user->github }}" target="_blank">{{ $article->user->name }}</a>. Оригинал на {{ $article->getOriginalHost() }} доступен по <a href="{{ $article->original_url }}">ссылке</a>.</p>
    </div>
</article>
@if (count($article->tags))
    <ul class="tags">
        @foreach ($article->tags as $tag)
            <li>
                <a href='{{ URL::to("tag/$tag->title") }}'>{{ $tag->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
<div class="sharing">
    <script src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
    <script>
        <!--
        document.write(VK.Share.button(false, {type: 'round', text: 'Поделиться'}));
        -->
    </script>
</div>
@if (count($similars))
    <div class="similars">
        <h4>Возможно, вам будет интересно также почитать:</h4>
        <div class="row">
            @foreach ($similars as $similar)
                <div class="col-xs-6">
                    <div class="similar-article">
                        <a href='{{ URL::to("article/$similar->id") }}'>
                            @if (null !== $similar->picture)
                                <img src="{{ $similar->picture->path }}" alt="">
                            @endif
                            <span>{{ $similar->title }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<div id="vk_comments"></div>
<script src="https://vk.com/js/api/openapi.js?136"></script>
<script>
    VK.init({
        apiId: 5784437,
        onlyWidgets: true
    });
    VK.Widgets.Comments('vk_comments');
</script>
@stop
