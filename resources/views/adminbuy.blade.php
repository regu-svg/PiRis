<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminbuy.css">
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
                <li><a href="adminitem">ТОВАРЫ</a></li>

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
        <select name="categs" id="category">
            <option value="-1">Все</option>
            <option {{$category==0?'selected':''}} value="0">Новые</option>
            <option {{$category==1?'selected':''}} value="1">Подтвержденные</option>
            <option {{$category==2?'selected':''}} value="2">Отмененные</option>
        </select>
    </div>

    <div class="container2" style="min-height: 15vw;">
        @foreach ($histories as $key => $order)
            <div class="order">
                <div class="left">
                    <div class="date">
                        <h2>ЗАКАЗ №{{ $key + 1 }}</h3>
                            <p style="margin-left: 2vw;">{{ $order->created_at }}</p>
                    </div>
                    <div class="customer">
                        <p>ЗАКАЗЧИК:</p>
                        <p style="margin-left: 2vw;">{{ $order->name }}</p>
                    </div>
                    <div class="cost">
                        <p>{{ $order->products }}</p>
                        <h3 class="money">{{ $order->price }}₽</h3>
                    </div>
                </div>
                <div class="ri">
                    <div class="status">
                        <p>СТАТУС:</p>
                        <p>{{ $status[$order->status] }}</p>
                    </div>
                    <div class="btns">
                        <a href="history/accept/{{ $order->id }}">
                            <button style={{$order->status==1?'background-color:gray;':''}}>ПОДТВЕРДИТЬ</button>
                        </a>
                        <a href="history/cancel/{{ $order->id }}">
                            <button style={{$order->status==2?'background-color:gray;':''}}>ОТМЕНИТЬ</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
    <footer>
        <p>Некоммерческий проект </p>
    </footer>

    <script>
        const category = document.getElementById('category')

        category.addEventListener('change', (e) => {
            let href = 'adminbuy';
            if(category.value != -1){
                href += '?category='+category.value;
            }
            location.href = href;
        })
    </script>
</body>

</html>
