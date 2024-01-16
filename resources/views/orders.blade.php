<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/orders.css">
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
                    <li><a href="login"><img class="iconhead" src="img/icons8-пользователь-96 1.svg"
                                alt=""></a>
                    </li>
                </div>

            </div>
        </nav>
    </header>
    <div class="container">
        <h2>СПИСОК ЗАКАЗОВ</h2>
    </div>

    <div class="container2">
        @foreach ($orders as $key => $order)
            <div class="order">
                <div class="left">
                    <h2>ЗАКАЗ №{{ $key+1 }}</h3>
                        <p>ИТОГ</p>
                        <div class="cost">
                            <p>{{ $order->products }}</p>
                            <h3 class="money">{{ $order->price }}₽</h3>
                        </div>
                </div>
                <div class="ri">
                    <div class="status">
                        <p>СТАТУС:</p>
                        <p style="text-align: end;">{{ $status[$order->status] }}</p>
                    </div>
                    <a href={{ $order->status == 0 ? 'history/' . $order->id : '' }}>
                        <button style={{ $order->status == 0 ? '' : 'background-color:gray;' }}>ОТМЕНИТЬ</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
    <footer>
        <p>Некоммерческий проект </p>
    </footer>


</body>

</html>
