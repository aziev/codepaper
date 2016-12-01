@extends ('layout')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <article class="single">
                <h1>{{ $article->title }}</h1>
                <div class="image">
                    <img src="http://placehold.it/500x300" alt="">
                </div>
                <div class="text">{!! $article->text !!}</div>
            </article>
        </div>
    </div>
</div>

@stop
