<?php

namespace rules;

use core\Rule;

class BadDesc extends Rule
{
    public $phrase = 'продажа от собственника';

    public function check($advert)
    {
        $lowerDesc = mb_strtolower($advert['description']);
        $lowerPhrase = mb_strtolower($this->phrase);

        if (strpos($lowerDesc, $lowerPhrase) !== false && $advert['owner'] == 0) {
            return false;
        }

        return true;
    }

    public static function getComment()
    {
        return 'Несоответствие описания';
    }
}