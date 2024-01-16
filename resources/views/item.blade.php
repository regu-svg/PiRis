<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/item.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days&family=Jost:wght@400;500;700&display=swap"
        rel="stylesheet">
    <title>CopyStar</title>
</head>

<body style="overflow-x: hidden;">
    <header>
        <div class="container1">

            <nav>
                <div class="nav1">
                    <li><a href="/"><img class="logo" src="img/логотип.svg" alt=""></a></li>
                </div>
                <div class="nav2" id="nav-list">
                    <li><a href="catalog">КАТАЛОГ</a></li>
                    <li><a href="info">ГДЕ НАС НАЙТИ?</a></li>

                    <div class="himg">
                        <li><a href="basket"><img class="iconhead" src="img/icons8-тележка-100 1 (1).svg"
                                    alt=""></a></li>
                        <li><a href="{{ $auth ? 'logout' : 'login' }}"><img class="iconhead"
                                    src="img/icons8-пользователь-96 1.svg" alt=""></a></li>
                    </div>

                </div>
            </nav>
            <div class="midl">
                <h1>О ТОВАРЕ</h1>
            </div>



        </div>
    </header>
    <div class="container">
        <h2>{{$printer->title.' '.$printer->model}}</h2>
        <div class="block">
            <img src={{$printer->img}} alt="">
            <div class="col1">
                <div class="all"><h3>СТРАНА-ПРОИЗВОДИТЕЛЬ</h3>
                <p>{{$printer->country}}</p>
                <h3>МОДЕЛЬ</h3>
                <p>{{$printer->model}}</p></div>
                
                <div class="price">
                    <h3>ЦЕНА:</h3>
                    <p>{{$printer->price}}₽</p>
                </div>
            </div>
            <div class="col2">
                <div class="all"><h3>ГОД ВЫПУСКА</h3>
                <p>{{$printer->year}}</p></div>
                
                <a href="/buy/{{$printer->id}}"><button>КУПИТЬ</button></a>
            </div>
        </div>
        <p class="inp">{{$printer->description}}</p>

    </div>


    <footer>
        <p>Некоммерческий проект </p>

    </footer>
</body>

</html>