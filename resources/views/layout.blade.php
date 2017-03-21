<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield ('title') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ version('css/app.css') }}">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">
    @yield ('meta')
    <meta property="fb:app_id" content="729337813885152">
    <meta name="root" content="{{ URL::to('/') }}">
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <a href="{{ URL::to('/') }}" class="logo">
                        @icon('logo')
                    </a>
                    <h1 class="insensible">Статьи о программировании</h1>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <form action="{{ URL::to('/') }}" class="search">
                        <input type="text" name="search" placeholder="Поиск...">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                @yield ('content')
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="sidebar sidebar-categories">
                    <h3>Категории</h3>
                    @foreach ($categories as $category)
                        <a href='{{ URL::to("category/$category->slug") }}' class="{{ Request::segment(2) == $category->slug ? 'active' : '' }}">
                            {{ $category->title }}<span class="count">{{ $category->getArticlesCount() }}</span>
                        </a>
                    @endforeach
                </div>
                <div class="sidebar">
                    <h3>Популярные статьи</h3>
                    @foreach ($popular_articles as $article)
                        <a href='{{ URL::to("article/$article->id") }}'>
                            {{ $article->title }}
                        </a>
                    @endforeach
                </div>
                <div class="sidebar">
                    <h3>Теги</h3>
                    <div class="tags">
                        @foreach ($tags as $tag)
                            <a href='{{ URL::to("tag/$tag->title") }}' class="tag">
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="text">
                <span>&copy; {{ config('app.name') }} 2017</span>
                <span class="pull-right">
                    <a href="https://vk.com/codepaper" target="_blank">Вконтакте</a>
                    <a href="https://www.facebook.com/codepaper.ru" target="_blank">Facebook</a>
                </span>
            </div>
        </div>
    </footer>
    <script src="{{ URL::asset('js/all.js') }}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-90727834-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9007766459323085",
            enable_page_level_ads: true
        });
    </script>
</body>
</html>
