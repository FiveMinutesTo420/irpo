<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    <header class='header'>
            <div class='header_info'>
                <a href="/"><img src="{{asset('img/лого.png')}}" alt="Логотип" class='logo'></a>
                <div class='burger_main'>
                    <div class='header_as'>
                        <a href="#" class='header_a'>О форуме</a>
                        <a href="#" class='header_a'>Программа форума</a>
                        <a href="#" class='header_a'>Организаторы</a>
                        <div class='dropdown'>
                            <a class='header_a'>Положение</a>
                            <div class="dropdown-content">
                                <a href="#" class='header_a'>Список финалистов</a>
                                <a href="#" class='header_a'>Сертификаты</a>
                                <a href="#coords" class='header_a'>Координаторы</a>
                                <a href="#" class='header_a'>Сборник</a>
                            </div>
                        </div>
                        <div class='mob_a'>
                            <a href="#" class='header_a'>Список финалистов</a>
                            <a href="#" class='header_a'>Сертификаты</a>
                            <a href="#" class='header_a'>Координаторы</a>
                            <a href="#" class='header_a'>Сборник</a>
                        </div>
                        @if(auth()->check())
                        <a href="{{route('admin')}}" class='header_a'>Админ панель</a>
                        @endif

                    </div>
                </div>
                <div class='burger'>
                    <span></span>
                </div>
            </div>
        </header>
    @yield('content')
    <footer>
        <script src="{{asset('js/script.js')}}"></script>
    
    </footer>
</body>
</html>