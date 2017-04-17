<?php

require(__DIR__ . '/core/View.php');
require(__DIR__ . '/models/Advert.php');

use core\View;
use models\Advert;

if ($_POST) {
    Advert::add($_POST);

    //редиректим на главную
    header('Location: /');
    return false;
}

//рендерим страницу
$view = new View();
$view->template = 'add';
echo $view->render();