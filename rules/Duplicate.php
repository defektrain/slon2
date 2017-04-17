<?php

namespace rules;

use core\Rule;
use models\Advert;

class Duplicate extends Rule
{
    public function check($advert)
    {
        $res = Advert::findAll('
            address = "' . $advert['address'] . '" AND
            floor = "' . $advert['floor'] . '" AND
            rooms = "' . $advert['rooms'] . '" AND
            area = "' . $advert['area'] . '" AND
            price = "' . $advert['price'] . '" AND
            id != ' . $advert['id'] . '
        ');

        if ($res) {
            return false;
        }

        return true;
    }

    public static function getComment()
    {
        return 'Найден дубликат';
    }
}