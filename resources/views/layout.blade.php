<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
    <nav class="mainnav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <a href="{{ URL::to('/') }}" class="logo">
                        <img src="{{ URL::asset('img/logo.png') }}" width="100" alt="">
                    </a>
                    <!-- <a href="">Категории</a>
                    <a href="">О сайте</a> -->
                </div>
                <div class="col-xs-12 col-sm-4">
                    <form action="{{ URL::to('/') }}" class="search">
                        <input type="text" name="search" placeholder="Поиск...">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @yield ('content')
    <footer class="container">
        <p>&copy; {{ config('app.name') }} 2017</p>
    </footer>
</body>
</html>
