<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 04.01.2019
 * Time: 17:34
 */

namespace ishop;


class Registry
{
    use TSingleton;

    private static $properties = [];

    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    public function getProperty($name) {
        if(isset(self::$properties[$name])) {
            return self::$properties[$name];
        }

        return null;
    }

    public function getProperties() {
        return self::$properties;
    }
}