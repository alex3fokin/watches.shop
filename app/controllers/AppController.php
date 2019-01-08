<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 07.01.2019
 * Time: 21:45
 */

namespace app\controllers;


use app\models\AppModel;
use ishop\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}