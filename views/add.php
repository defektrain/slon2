<?php

use models\Advert;

?>

<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="width=device-width,initial-scale=1" name=viewport>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <h1 class="page-header">Добавление объявления</h1>

        <form action="/add.php" method="post">
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Адрес">
            </div>
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select id="status" name="status" class="form-control">
                    <option value="0">Автомодерация</option>
                    <option value="1">Прошло автомодерацию</option>
                    <option value="-1">Не прошло автомодерацию</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Тип</label>
                <select id="type" name="type" class="form-control">
                    <option value="0">Продажа</option>
                    <option value="1">Аренда</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Цена">
            </div>
            <div class="form-group">
                <label for="owner">Тип владельца</label>
                <select id="owner" name="owner" class="form-control">
                    <option value="0">Риэлтор</option>
                    <option value="1">Собственник</option>
                </select>
            </div>
            <div class="form-group">
                <label for="floor">Этаж</label>
                <input type="text" class="form-control" id="floor" name="floor" placeholder="Этаж">
            </div>
            <div class="form-group">
                <label for="storeys">Этажей</label>
                <input type="text" class="form-control" id="storeys" name="storeys" placeholder="Этажей">
            </div>
            <div class="form-group">
                <label for="rooms">Кол-во комнат</label>
                <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Кол-во комнат">
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="text" class="form-control" id="area" name="area" placeholder="Площадь">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="source">Источник</label>
                <input type="text" class="form-control" id="source" name="source" placeholder="Источник">
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <div class="text-center">
            <a href="/" class="btn btn-default">Назад</a>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

</body>

</html>