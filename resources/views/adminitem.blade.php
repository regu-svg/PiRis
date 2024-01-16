<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminitem.css">
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
                <li><a href="adminbuy">ЗАКАЗЫ</a></li>

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
        <h2>КАТЕГОРИИ И ТОВАРЫ</h2>
    </div>

    <div class="container2">
        <div class="catandinputs">
            <form method="POST" action="category" class="cats">
                <h3>КАТЕГОРИИ</h3>
                @foreach ($categories as $category)
                    @if ($category->title != 'не указано')
                    <button type="button" class="add">{{ $category->title }} 
                        <a href="category/{{ $category->id }}">
                            <img src="img/icons8-мусор-100 (1).png"alt="">
                        </a>
                    </button>
                    @endif
                @endforeach
                @csrf
                <input name="title" type="text" placeholder="НОВАЯ КАТЕГОРИЯ" required minlength="5">
                <button>ДОБАВИТЬ</button>
            </form>
            @if ($update != null)
                <form method="POST" action="/printer/update/{{ $update->id }}" enctype="multipart/form-data"
                    class="inputs">
                    <h3>ТОВАР</h3>
                    <div class="columns">
                        @csrf
                        <input name="title" type="text" placeholder="НАЗВАНИЕ" value="{{ $update->title }}"
                            required>
                        <input name="model" type="text" placeholder="МОДЕЛЬ" value="{{ $update->model }}" required>
                        <select name="country" id="category-manufacter" required>
                            <option {{ $update->country == 'не указано' ? 'selected' : '' }} value="не указано">СТРАНА
                            </option>
                            <option {{ $update->country == 'Россия' ? 'selected' : '' }} value="Россия">Россия</option>
                            <option {{ $update->country == 'США' ? 'selected' : '' }} value="США">США</option>
                            <option {{ $update->country == 'Япония' ? 'selected' : '' }} value="Япония">Япония</option>
                        </select>
                        <select name="year" id="category-year" required>
                            <option {{ $update->year == '' ? 'selected' : '' }} value="">ГОД ВЫПУСКА</option>
                            <option {{ $update->year == '2023' ? 'selected' : '' }} value="2023">2023</option>
                            <option {{ $update->year == '2022' ? 'selected' : '' }} value="2022">2022</option>
                            <option {{ $update->year == '2021' ? 'selected' : '' }} value="2021">2021</option>
                        </select>
                        <input name="price" type="text" placeholder="ЦЕНА" value="{{ $update->price }}" required>
                        <label class="input-file">
                            <input type="file" name="img" value="{{ $update->img }}">
                            <span>ФОТО</span>
                        </label>
                    </div>
                    <textarea name="description" id="" placeholder="ОПИСАНИЕ" required>{{ $update->description }}</textarea>
                    <div class="selandbutton">
                        <select name="category" id="category-select" required>
                            @foreach ($categories as $category)
                                <option {{ $update->category == $category->id ? 'selected' : '' }}
                                    value={{ $category->id }}>
                                    {{ $category->title == 'не указано' ? 'КАТЕГОРИЯ' : $category->title }}</option>
                            @endforeach
                        </select>
                        <button type="submit">ИЗМЕНИТЬ</button>
                        <a href="adminitem" style="color: gray;">НЕ ИЗМЕНЯТЬ</a>
                    </div>
                </form>
            @else
                <form method="POST" action="/printer" enctype="multipart/form-data" class="inputs">
                    <h3>ТОВАР</h3>
                    <div class="columns">
                        @csrf
                        <input name="title" type="text" placeholder="НАЗВАНИЕ" required>
                        <input name="model" type="text" placeholder="МОДЕЛЬ" required>
                        <select name="country" id="category-manufacter" required>
                            <option value="не указано">СТРАНА</option>
                            <option value="Россия">Россия</option>
                            <option value="США">США</option>
                            <option value="Япония">Япония</option>
                        </select>

                        <select name="year" id="category-year" required>
                            <option value="">ГОД ВЫПУСКА</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="1020">2021</option>
                        </select>
                        <input name="price" type="text" placeholder="ЦЕНА" required>
                        <label class="input-file">
                            <input type="file" name="img" required>
                            <span>ФОТО</span>
                        </label>
                    </div>
                    <textarea name="description" id="" placeholder="ОПИСАНИЕ" required></textarea>
                    <div class="selandbutton">
                        <select name="category" id="category-select" required>
                            <option value='4'>КАТЕГОРИЯ</option>
                            @foreach ($categories as $category)
                                @if ($category->title != 'не указано')
                                    <option value={{ $category->id }}>{{ $category->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit">ДОБАВИТЬ</button>
                    </div>

                </form>
            @endif
        </div>

        <div class="content">
            @foreach ($printers as $printer)
                <div class="card">
                    <img src={{ $printer->img }} alt="">
                    <p>{{ $printer->title . ' ' . $printer->model }}</p>
                    <div class="btn">
                        <a href="/adminitem?update={{ $printer->id }}"><button>РЕДАКТ.</button></a>
                        <a href="/printer/delete/{{ $printer->id }}"><button>УДАЛИТЬ</button></a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    </div>


    </div>
    <footer>
        <p>Некоммерческий проект </p>

    </footer>


</body>

</html>
