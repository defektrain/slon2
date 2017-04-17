<?php

namespace rules;

use core\Rule;

class StopWords extends Rule
{
    public $path = './data/stop-words.txt';

    public function check($advert)
    {
        if ($file = fopen($this->path, "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                if (strpos(mb_strtolower($advert['description']), trim(mb_strtolower($line))) !== false) {
                    return false;
                }
            }
            fclose($file);
        }

        return true;
    }

    public static function getComment()
    {
        return 'Описание содержит “стоп слова”';
    }
}