<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/autor.css">
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
                    <li><a href="basket"><img class="iconhead" src="img/icons8-тележка-100 1 (1).svg" alt=""></a>
                    </li>
                    <li><a href="login"><img class="iconhead" src="img/icons8-пользователь-96 1.svg" alt=""></a>
                    </li>
                </div>

            </div>
        </nav>
    </header>
    <div class="all">
    <form method="POST" action="login" class="container">
            <h2>АВТОРИЗАЦИЯ</h2>
            <div class="container2">
            <div class="inputs">
                @csrf
                <input name="login" type="text" placeholder="Введите ЛОГИН" required>
                <input name="password" type="password" placeholder="Введите ПАРОЛЬ" required>
                <button type="submit">ВОЙТИ</button>
            <p>У вас нет аккаунта?<a href="create">Зарегистрируйтесь</a></p></div>
            </div>
    </form>

</div>
</body>

</html>