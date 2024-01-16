<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/indstyle.css">

    <title>CopyStar</title>
</head>

<body>
    <header>
        <div class="container1">

            <nav>
                <div class="nav1">
                    <li><a href="/"><img class="logo" src="img/логотип.svg" alt=""></a></li>
                </div>
                <div class="nav2" id="nav-list">
                    <li><a href="catalog">КАТАЛОГ</a></li>
                    @if ($admin)
                        <li><a href="adminitem">АДМИН-ПАНЕЛЬ</a></li>
                    @else
                        <li><a href="info">ГДЕ НАС НАЙТИ?</a></li>
                    @endif
                    <div class="himg">
                        <li><a href="basket"><img class="iconhead" src="img/icons8-тележка-100 1 (1).svg"
                                    alt=""></a></li>
                        <li><a href="{{ $auth ? 'logout' : 'login' }}"><img class="iconhead"
                                    src="img/icons8-пользователь-96 1.svg" alt=""></a></li>
                    </div>

                </div>
            </nav>
            <div class="midl">
                <img src="img/image 36.png" alt="">
                <h1>COPY STAR</h1>
                <p>КОПИРАЛЬНОЕ ОБОРУДОВАНИЕ</p>
            </div>



        </div>
    </header>
    <div class="container">
        <div class="container11">
            <h2>О НАШЕЙ КОМПАНИИ</h2>
        </div>
        <div class="container2">
            <p style="font-weight: bold; margin-bottom: 1vw; color: #616976;">Качество, простота, надежность – ваш
                печатный успех!</p>
            <p>Копировальное оборудование для бизнеса, созданное для качественной печати и оперативной работы.</p>

        </div>

        <div class="container3">
            <h2>НОВИНКИ КОМПАНИИ</h2>
            <img src="img/Arrow 1.svg" alt="">

        </div>
        <div class="container4">
            <img src="img/side-view-employee-using-printer-at-work 1.png" alt="">
        </div>

        <div class="container5">
            <h2>ПОСЛЕДНИЕ ВЫШЕДШИЕ МОДЕЛИ НАШЕЙ КОМПАНИИ</h2>
            <a href="catalog"><button>ПЕРЕЙТИ В КАТАЛОГ</button></a>

        </div>
        <div class="container6">
            <div class="c2block">
                <div class="wrapper">
                    <div class="slider-container">
                        <div class="slider-track">
                            @foreach ($products as $product)
                                <div class="slider-iteam">
                                    <img class="leaves" src={{$product->img}}
                                        alt="">
                                    <p>{{$product->title.' '.$product->model}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <button class="btn-prev"><img src="img/Polygon 1.svg" alt=""></button>
                        <button class="btn-next"><img src="img/Polygon 1.svg" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <footer>
        <p>Некоммерческий проект </p>

    </footer>
    <script src="./js/script.js"></script>
</body>

</html>
