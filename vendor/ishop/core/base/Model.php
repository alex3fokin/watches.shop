<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 08.01.2019
 * Time: 18:48
 */

namespace ishop\base;

use ishop\Db;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }
}