@extends ('layout')

@section ('title', $article->title . ' &mdash;')

@section ('meta')
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ $article->title }}">
<meta property="og:description" content="{{ $article->getPreviewText() }}">
<meta property="image" content="{{ URL::asset($article->picture->getPath('vk')) }}"> <!-- VK -->
<meta property="og:image" content="{{ URL::asset($article->picture->getPath('fb')) }}"> <!-- FB -->
<meta property="fb:app_id" content="729337813885152">
@stop

@section ('content')
<article class="single">
    @can('update', $article)
        <a href='{{ URL::to("article/$article->id/edit") }}' class="space-right">
            <i class="fa fa-pencil" aria-hidden="true"></i>Редактировать
        </a>
    @endcan
    @can('delete', $article)
        <form action='{{ URL::to("article/$article->id") }}' method="POST" class="inline-form">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button onclick="return confirm('Вы уверены что хотите удалить статью?');">
                <i class="fa fa-trash-o" aria-hidden="true"></i>Удалить
            </button>
        </form>
    @endcan
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
