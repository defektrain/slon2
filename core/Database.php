<?php

namespace core;

use mysqli;

class Database extends MySQLi
{
    public static $instance = null;

    public function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self('localhost', 'root', '', 'slon2');
        }
        return self::$instance;
    }
}