<?php

namespace rules;

use core\Rule;
use models\Advert;

class Suspicious extends Rule
{
    public function check($advert)
    {
        if ($advert['owner'] == 1) {
            $res = Advert::findAll('phone = "' . $advert['phone'] . '"');
            if (count($res) > 5) {
                return false;
            }
        }

        return true;
    }

    public static function getComment()
    {
        return 'Подозрительное объявление';
    }
}