<?php

namespace rules;

use core\Rule;

class Blacklist extends Rule
{
    public $path = './data/blacklist.txt';

    public function check($advert)
    {
        if ($file = fopen($this->path, "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                if (trim($line) == $advert['phone']) {
                    return false;
                }
            }
            fclose($file);
        }

        return true;
    }

    public static function getComment()
    {
        return 'Номер телефона собственника находится в “черном списке”';
    }
}