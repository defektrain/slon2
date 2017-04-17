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
        <h1 class="page-header">Главная</h1>

        <table class="table table-striped">
            <caption>Входящие объявления</caption>
            <thead>
            <tr>
                <th>ID</th>
                <th>Адрес</th>
                <th>Название</th>
                <th>Телефон</th>
                <th>Статус</th>
                <th>Тип</th>
                <th>Цена</th>
                <th>Тип продавца</th>
                <th>Этаж</th>
                <th>Этажность</th>
                <th>Кол-во комнат</th>
                <th>Общая площадь</th>
                <th>Описание</th>
                <th>Источник</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $ad) : ?>
                <tr>
                    <td><?= $ad['id'] ?></td>
                    <td><?= $ad['address'] ?></td>
                    <td><?= $ad['name'] ?></td>
                    <td><?= $ad['phone'] ?></td>
                    <td><?= Advert::printStatus($ad['status']) ?></td>
                    <td><?= Advert::printType($ad['type']) ?></td>
                    <td><?= $ad['price'] ?></td>
                    <td><?= Advert::printOwner($ad['owner']) ?></td>
                    <td><?= $ad['floor'] ?></td>
                    <td><?= $ad['storeys'] ?></td>
                    <td><?= $ad['rooms'] ?></td>
                    <td><?= $ad['area'] ?></td>
                    <td><?= $ad['description'] ?></td>
                    <td><?= $ad['source'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="/?moderate=true" class="btn btn-success">Запустить автомодерацию</a>
            <a href="/add.php" class="btn btn-primary">Добавить объявление</a>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

</body>

</html>