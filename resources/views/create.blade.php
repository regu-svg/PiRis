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
    <div class="all">
        <form method="POST" action="create" class="container">
            <h2>РЕГИСТРАЦИЯ</h2>
            <div class="container2">
                <div class="inputs2">
                    <input name="name" type="text" placeholder="Введите ИМЯ" required>
                    <input name="surname" type="text" placeholder="Введите ФАМИЛИЮ" required>
                    <input name="lastname" type="text" placeholder="Введите ОТЧЕСТВО">
                    <input name="login" type="text" placeholder="Введите ЛОГИН" required>
                    <p>Уже есть аккаунт? <a href="login">Войдите</a></p>
                </div>
                <div class="inputs">
                    @csrf
                    <input name="email" type="email" placeholder="Введите E-MAIL" required>
                    @error('email')
                        <label>{{ $message }}</label><br>
                    @enderror
                    <input name="password" type="password" placeholder="Введите ПАРОЛЬ" required>
                    <input name="password_confirmation" type="password" placeholder="Подтвердите ПАРОЛЬ" required>
                    @error('password')
                        <label>{{ $message }}</label><br>
                    @enderror
                    <div class="chek"><input checked class="checkb" type="checkbox" name="agree" id=""
                            required>
                        <label for="checkbox">Я согласен(-сна) с правилами регистрации</label>
                    </div>
                    <button type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                </div>

            </div>
        </form>

    </div>
</body>

</html>
