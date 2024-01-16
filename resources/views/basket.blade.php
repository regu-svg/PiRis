<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/basket.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days&family=Jost:wght@400;500;700&display=swap"
        rel="stylesheet">
    <title>CopyStar</title>
</head>

<body>
    <header>
        <nav>
            <div class="nav1">
                <li><a href="/"><img class="logo" src="img/логотип.svg" alt=""></a></li>
            </div>
            <div class="nav2" id="nav-list">
                <li><a href="catalog">КАТАЛОГ</a></li>
                <li><a href="info">ГДЕ НАС НАЙТИ?</a></li>

                <div class="himg">
                    <li><a href="basket"><img class="iconhead" src="img/icons8-тележка-100 1 (1).svg"
                                alt=""></a>
                    </li>
                    <li><a href="logout"><img class="iconhead" src="img/icons8-пользователь-96 1.svg"
                                alt=""></a>
                    </li>
                </div>

            </div>
        </nav>
    </header>
    <div class="container">
        <h2>КОРЗИНА</h2>
        <a href="orders"><button>МОИ ЗАКАЗЫ</button></a>
    </div>

    <div class="container2">
        <div class="content2">
            @foreach ($baskets as $basket)
                <div class="weight">
                    <img src={{ $basket->img }} alt="">
                    <div class="w1">
                        <p class="vid">{{ $basket->title . ' ' . $basket->model }}</p>
                        <div class="wbtn">
                            <a href="/basket/minus/{{ $basket->id }}"><button class="minus">-</button></a>
                            <input type="text" value={{ $basket->count }} readonly>
                            <a href="/basket/plus/{{ $basket->id }}"><button class="plus">+</button></a>
                        </div>
                    </div>
                    <div class="w2">
                        <h3 class="money">{{ $basket->price * $basket->count }}₽</h3>
                        <a href="/basket/{{ $basket->id }}"><button class="del">
                                <img src="img/icons8-мусор-100.png" alt="">
                            </button></a>
                    </div>
                </div>
            @endforeach
        </div>
        <form method="POST" action="/buyAll" class="total">
            <h2>ЗАКАЗ</h3>
                <p>ИТОГ</p>
                <div class="cost">
                    <p>{{ $count_all }} ТОВАР</p>
                    <h3 class="money">{{ $price_all }}₽</h3>
                </div>
                @csrf
                <input name="password" type="password" placeholder="Введите пароль">
                @error('password')
                    <p>Неверный пароль</p>
                @enderror
                <button>КУПИТЬ</button>
        </form>
    </div>
    @if (count($baskets) == 0)
        <div class="container2empty">
            <div class="empty">
                <img src="img/icons8-корзина-100 1.svg" alt="">
                <h1>ВАША КОРЗИНА ПУСТА</h1>
                <a href="catalog">
                    <p style="color: black">Нажмите здесь, чтобы продолжить покупки</p>
                </a>
            </div>
    @endif

    </div>
    <footer>
        <p>Некоммерческий проект </p>
    </footer>
</body>

</html>
