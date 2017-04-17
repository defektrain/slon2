<?php

require(__DIR__ . '/core/Database.php');
require(__DIR__ . '/core/Moder.php');
require(__DIR__ . '/core/Rule.php');
require(__DIR__ . '/core/View.php');

require(__DIR__ . '/models/Advert.php');

use core\Database;
use core\Moder;
use core\View;
use models\Advert;

$db = new Database('localhost', 'root', '', 'slon2');

//если запускаем автомодерацию
if ($_REQUEST['moderate']) {
    $moder = new Moder();

    //добавляем динамические критерии
    $moder->loadRules([
        'rules\Blacklist',
        'rules\StopWords',
        'rules\BadDesc',
        'rules\Suspicious',
        'rules\Duplicate',
    ]);

    //добавляем динамические исключения Источник<->Критерий
    $moder->loadSourceRules([
        'Агентство 1' => [
            'rules\Blacklist',
            'rules\BadDesc',
        ],
    ]);

    //запускам автомодерацию
    $moder->run();

    //редиректим на главную
    header('Location: /');
    return false;
}

//выбираем из БД все объявления
$data = Advert::findAll();

//рендерим страницу
$view = new View();
$view->template = 'main';
echo $view->render($data);