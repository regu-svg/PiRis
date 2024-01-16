<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/catstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days&family=Jost:wght@400;500;700&display=swap"
        rel="stylesheet">
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
                <img src="img/image 36.png" alt="">
                <h1>КАТАЛОГ</h1>
            </div>



        </div>
    </header>
    <div class="container">
        <div class="inputs">
            <h2>УПОРЯДОЧИТЬ</h2>
            <h3>ГОД ПРОИЗВОДСТВА</h3>
            <select name="year" id="category-year">
                <option value="не выбрано">Не выбран</option>
                <option {{$selected['year']=='2023'?'selected':''}} value="2023">2023</option>
                <option {{$selected['year']=='2022'?'selected':''}} value="2022">2022</option>
                <option {{$selected['year']=='2021'?'selected':''}} value="2021">2021</option>
            </select>
            </select>
            <h3>ПРОИЗВОДИТЕЛЬ</h3>
            <select name="manufacter" id="category-manufacter">
                <option value="не выбрано">Не выбран</option>
                <option {{$selected['country']=='Россия'?'selected':''}} value="Россия">Россия</option>
                <option {{$selected['country']=='США'?'selected':''}} value="США">США</option>
                <option {{$selected['country']=='Япония'?'selected':''}} value="Япония">Япония</option>
            </select>
            <h3>КАТЕГОРИЯ</h3>
            <select name="select" id="category-select">
                <option value="не выбрано">Не выбран</option>
                @foreach ($category as $item)
                    <option {{$selected['category']==$item->id?'selected':''}} value={{$item->id}}>{{$item->title}}</option>
                @endforeach
            </select>
            <button id="find">НАЙТИ</button>
        </div>


        <div class="content">
            @foreach ($products as $product)
                <div class="card" onClick="location.href = 'item?id={{ $product->id }}'">
                    <img src={{ $product->img }} alt="">
                    <p style="color: black">{{ $product->title . ' ' . $product->model }}</p>
                    <div class="btn">
                        <h1>{{ $product->price }}₽</h1>
                        <a href="/buy/{{ $product->id }}"><button>КУПИТЬ</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer>
        <p>Некоммерческий проект </p>
    </footer>
    <script>
        const year = document.getElementById('category-year')
        const manufacter = document.getElementById('category-manufacter')
        const select = document.getElementById('category-select')
        const find = document.getElementById('find')

        find.addEventListener('click', (e) => {
            let href = 'catalog?';
            if(year.value != "не выбрано"){
                href += 'year='+year.value+'&';
            }
            if(manufacter.value != "не выбрано"){
                href += 'country='+manufacter.value+'&';
            }
            if(select.value != "не выбрано"){
                href += 'category='+select.value+'&';
            }
            location.href = href;
        })
    </script>
</body>

</html>
