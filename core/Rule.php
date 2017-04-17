<?php

namespace core;

abstract class Rule
{
    abstract public function check($advert);

    abstract public static function getComment();
}