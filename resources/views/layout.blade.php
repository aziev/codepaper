<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield ('title') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <a href="{{ URL::to('/') }}" class="logo">CodePaper</a>
                    <h1 class="insensible">Статьи о программировании</h1>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <form action="{{ URL::to('/') }}" class="search">
                        <input type="text" name="search" placeholder="Поиск...">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-7 col-md-offset-1">
                @yield ('content')
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-1">
                <aside>
                    <h3>Категории</h3>
                    @foreach ($categories as $category)
                        <a href="">{{ $category->title }} ({{ $category->getArticlesCount() }})</a>
                    @endforeach
                </aside>
                <aside>
                    <h3>Теги</h3>
                    @foreach ($tags as $tag)
                        <a href="">{{ $tag->title }} ({{ $tag->getArticlesCount() }})</a>
                    @endforeach
                </aside>
            </div>
        </div>
    </div>
    <footer class="container">
        <p>&copy; {{ config('app.name') }} 2017</p>
    </footer>
</body>
</html>
