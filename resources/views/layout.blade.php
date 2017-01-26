<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield ('title') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">
    @yield ('meta')
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <a href="{{ URL::to('/') }}" class="logo">
                        @icon('logo')
                    </a>
                    <h1 class="insensible">Статьи о программировании</h1>
                    <div class="categories">
                        @foreach ($categories as $category)
                            <a href='{{ URL::to("category/$category->slug") }}'>{{ $category->title }}</a>
                        @endforeach
                    </div>
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
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                @yield ('content')
            </div>
            <!-- <div class="col-xs-12 col-md-3 col-md-offset-1">
                <aside>
                    <h3>Категории</h3>
                    @foreach ($categories as $category)
                        <a href='{{ URL::to("category/$category->slug") }}'>
                            {{ $category->title }}
                            <span class="count">{{ $category->getArticlesCount() }}</span>
                        </a>
                    @endforeach
                </aside>
                <aside>
                    <h3>Теги</h3>
                    @foreach ($tags as $tag)
                        <a href="">
                            {{ $tag->title }}
                            <span class="count">{{ $tag->getArticlesCount() }}</span>
                        </a>
                    @endforeach
                </aside>
            </div> -->
        </div>
    </div>
    <footer class="container">
        <p>&copy; {{ config('app.name') }} 2017</p>
    </footer>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-90727834-1', 'auto');
        ga('send', 'pageview');
    </script>
    
</body>
</html>
