<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 08.01.2019
 * Time: 18:55
 */

namespace ishop;

class Db
{
    use TSingleton;

    protected function __construct()
    {
        $db = require_once CONFIG . DIRECTORY_SEPARATOR . "db.php";
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['password']);
        if(!\R::testConnection()) {
            throw new \Exception("Нет соединения с БД", 500);
        }
        \R::freeze(true);
        if(DEBUG) {
            \R::debug(true, 1);
        } else {

        }
    }
}