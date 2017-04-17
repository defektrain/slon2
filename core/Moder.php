<?php

namespace core;

use models\Advert;

/**
 * Class Moder
 * @package core
 */
class Moder
{
    /**
     * @var array
     */
    private $data = [];
    /**
     * @var array
     */
    public $rules = [];
    /**
     * @var array
     */
    public $sourceRules = [];

    public function __construct()
    {
        //загружаем объявления
        self::loadData();
    }

    /**
     * Выбирает из БД все объявления ожидающие модерацию и добавляет в коллекцию
     */
    private function loadData()
    {
        $this->data = Advert::findAll('status = ' . Advert::STATUS_AM);
    }

    /**
     * Загружает правила и добавляет инстансы в коллекцию
     * @param array $rules
     */
    public function loadRules($rules = [])
    {
        foreach ($rules as $rule) {
            //загружаем класс правил через преобразование namespace
            $class = str_replace('\\', '/', $rule);
            require_once('./' . $class . '.php');

            //добавялем инстанс правила в коллекцию
            $this->rules[] = new $rule;
        }
    }

    /**
     * Загружает исключения Источник->Критерии
     * @param array $sourceRules
     */
    public function loadSourceRules($sourceRules = [])
    {
        $this->sourceRules = $sourceRules;
    }

    /**
     * Производит автомодерацию
     */
    public function run()
    {
        $db = Database::getInstance();

        //проверяем все не проверенные объявления
        foreach ($this->data as $advert) {
            $status = Advert::STATUS_AM_OK;
            $ruleClass = null;

            foreach ($this->rules as $rule) {
                //проверка исключений
                if ($this->applySourceRule($advert['source'], $rule)) {
                    //проверка правила
                    if (!$rule->check($advert)) {
                        $status = Advert::STATUS_AM_FAILED;
                        $ruleClass = get_class($rule);
                        break;
                    }
                }
            }

            //обновляем статус
            $db->query("UPDATE advert SET status = $status WHERE id = " . $advert['id']);
            //записываем историю
            $this->writeHistory($advert, $status, $ruleClass);
        }
    }

    /**
     * Проверяет нет ли исключения по данному источнику
     */
    private function applySourceRule($source, $rule)
    {
        if (is_array($this->sourceRules[$source])) {
            if (in_array(get_class($rule), $this->sourceRules[$source])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Записывает историю статуса
     */
    private function writeHistory($advert, $status, $ruleClass)
    {
        $params = [
            'advert_id = ' . $advert['id'],
            'status = ' . $status,
        ];

        if ($ruleClass) {
            $params[] = 'rule = "' . addslashes($ruleClass) . '"';
            $params[] = 'comment = "' . $ruleClass::getComment() . '"';
        }

        $db = Database::getInstance();
        $db->query('INSERT INTO history SET ' . implode(', ', $params));
    }
}