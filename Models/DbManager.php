<?php

namespace App\models;

use PDO;

abstract class DbManager
{
    private static $pdo;

    /**
     * @return void
     */
    private static function setBdd(): void
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=blog_php;charset=utf8","root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    /**
     * @return mixed
     */
    protected function getBdd(): mixed
    {
        if (self::$pdo === null) {
            self::setBdd();
        }

        return self::$pdo;
    }
}
