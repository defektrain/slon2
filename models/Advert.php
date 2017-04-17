<?php

namespace models;

use core\Database;

/**
 * Class Advert
 * @package models
 */
class Advert
{
    //возможные статусы объявления
    const STATUS_AM = 0;
    const STATUS_AM_OK = 1;
    const STATUS_AM_FAILED = -1;

    //возможные типы объявления
    const TYPE_SALE = 0;
    const TYPE_RENT = 1;

    /**
     * Добавление объявления в БД
     * TODO: не реализована валидация
     *
     * @return boolean
     */
    public static function add($data)
    {
        $params = [];

        foreach ($data as $key => $item) {
            $params[] = $key . ' = "' . $item . '"';
        }

        $db = Database::getInstance();
        return $db->query('INSERT INTO advert SET ' . implode(', ', $params));
    }

    /**
     * Возвращает массив объявлений из БД (без фильтров)
     * @return array
     */
    public static function findAll($where = '')
    {
        $data = [];

        $db = Database::getInstance();
        $sql = self::prepareSql("SELECT * FROM advert", $where);
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * @param $sql
     * @param string $where
     * @return string
     */
    public static function prepareSql($sql, $where = '')
    {
        if ($where) {
            $sql .= ' WHERE ' . $where;
        }

        return $sql;
    }

    /**
     * Хелпер для отображения статуса
     * @param $status
     * @return string
     */
    public static function printStatus($status)
    {
        if ($status == self::STATUS_AM) {
            return 'Автомодерация';
        } elseif ($status == self::STATUS_AM_OK) {
            return 'Прошло автомодерацию';
        } else {
            return 'Не прошло автомодерацию';
        }
    }

    /**
     * Хелпер для отображения типа объявления
     * @param $type
     * @return string
     */
    public static function printType($type)
    {
        if ($type == self::TYPE_RENT) {
            return 'Аренда';
        } else {
            return 'Продажа';
        }
    }

    /**
     * Хелпер для отображения типа продавца
     * @param $owner
     * @return string
     */
    public static function printOwner($owner)
    {
        if ($owner) {
            return 'Собственник';
        } else {
            return 'Риэлтор';
        }
    }
}