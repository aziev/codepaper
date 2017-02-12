<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ошибка @yield('error') — {{ config('app.name') }}</title>
    <style>
        html, body{
            height: 100%;
        }
        body{
            margin: 0;
            font-family: sans-serif;
            background: #f5f5f5;
            text-align: center;
            color: #999;
        }
        .table{
            display: table;
            width: 100%;
            min-height: 100%;
        }
        .cell{
            display: table-cell;
            vertical-align: middle;
            padding: 80px 0;
        }
        svg{
            height: 30px;
        }
        svg .cls-1{
            fill: #333;
        }
        h1{
            font-size: 96px;
            font-weight: 400;
            margin: 0 0 10px;
        }
        p{
            font-size: 26px;
            margin: 10px 0 20px;
        }
        .logo{
            display: inline-block;
            position: absolute;
            top: 20px;
            left: 50%;
            margin-left: -77px;
        }
        a{
            color: #1878bb;
        }
    </style>
</head>
<body>
    <div class="table">
        <div class="cell">
            <a href="{{ URL::to('/') }}" class="logo">@icon ('logo')</a>
            <h1>@yield('error')</h1>
            <p>@yield('message')</p>
            <!-- <a href="{{ URL::to('/') }}">Перейти на главную</a> -->
        </div>
    </div>
</body>
</html>
