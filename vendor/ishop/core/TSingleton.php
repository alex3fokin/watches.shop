<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 04.01.2019
 * Time: 17:36
 */

namespace ishop;


trait TSingleton
{
    private static $instance;

    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}