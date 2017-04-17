<?php

namespace core;

/**
 * Class View
 * @package core
 */
class View
{
    /**
     * Название файла шаблона в папке views
     * @var string
     */
    public $template = 'main';

    /**
     * Рендер загруженного шаблона
     * @param array $data
     * @return string
     */
    public function render($data = [])
    {
        ob_start();
        include('/views/' . $this->template . '.php');
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}