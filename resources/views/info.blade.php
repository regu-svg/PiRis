<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/infostyle.css">
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
                <h1>ГДЕ НАС НАЙТИ</h1>
            </div>



        </div>
    </header>
    <div class="container">
        <div class="map">
            <iframe
                src="https://yandex.ru/map-widget/v1/?um=constructor%3Af59369a0a23ff80e04a706544050c303e7ffb7321b93640bbc87410b67eda130&amp;source=constructor"
                frameborder="0"></iframe>
        </div>
        <div class="inf">
            <h3>АДРЕС</h3>
            <p>Смоляной переулок, 2</p>
            <h3>НОМЕР ТЕЛЕФОНА</h3>
            <p>8 800 555 3535</p>
            <h3>E-MAIL</h3>
            <p>starcopy3000@mail.ru</p>
        </div>
    </div>

   
    <footer>
        <p>Некоммерческий проект </p>
        
    </footer>
</body>

</html>