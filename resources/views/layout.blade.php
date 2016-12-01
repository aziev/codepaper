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
            <a href="{{ URL::to('/') }}">Все статьи</a>
            <a href="">Категории</a>
            <a href="">О сайте</a>
            <form action="{{ URL::to('/') }}" class="search">
                <input type="text" name="search" placeholder="Поиск...">
            </form>
        </div>
    </nav>
    @yield ('content')
    <footer class="container">
        <p>&copy; {{ config('app.name') }} 2017</p>
    </footer>
</body>
</html>
