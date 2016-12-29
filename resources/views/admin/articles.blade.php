@extends ('admin.layout')

@section ('content')

<div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Статьи </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                </tr>
                            </thead>
               @foreach ($articles as $article)
               <tr>
                    <td>{{ $article->id }} </td>
                    <td><a href="{!! action('ArticleController@edit', $article->id) !!}">{!! $article->title !!} </a> </td>
                    <td>{{ $article->description }}</td>
                    <td><form method="post" action="{!! action('ArticleController@destroy', $article->id) !!}" class="pull-left">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <button type="submit" class="btn btn-warning">Удалить</button>
                    </form></td>
                </tr>
               @endforeach
            </table>
        </div>
    </div>

    @stop