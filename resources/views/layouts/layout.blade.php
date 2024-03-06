<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    <header>
            <div class='bg_header'></div>
            <div class='header_info'>
                <a href=""><img src="{{asset('img/лого.png')}}" alt="Логотип" class='logo'></a>
                <div class='header_a'>
                    <a href="#">Список финалистов</a>
                    <a href="#">О форуме</a>
                    <a href="#">Положение</a>
                    <a href="#">Программа форума</a>
                    <a href="#">Организаторы</a>
                    <a href="#">Сертификаты</a>
                    <a href="#">Координаторы</a>
                    <a href="#">Сборник</a>
                </div>
                <div class='profile'>
                    <a href="#"><img src="{{asset('img/reg.png')}}" alt=""></a>
                </div>
            </div>
        </header>
    @yield('content')
    <footer>

    </footer>
</body>
</html>