<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 05.01.2019
 * Time: 18:22
 */

namespace app\controllers;

class MainController extends AppController
{
    public function indexAction() {
        $this->setMeta('test', 'test desc', 'test,key,words');
        $name = 'John';
        $age = 30;
        $names = ['Vasya', 'Petya'];
        $this->set(compact('name', 'age', 'names'));
    }
}