<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 05.01.2019
 * Time: 18:22
 */

namespace app\controllers;

use ishop\Cache;

class MainController extends AppController
{
    public function indexAction() {
        $posts = \R::findAll('test');
        $post = \R::findOne('test', 'id = ?', [2]);
        $this->setMeta('test', 'test desc', 'test,key,words');
        $name = 'John';
        $age = 30;
        $names = ['Vasya', 'Petya', 'Mike'];
        $cache = Cache::instance();
        //$cache->set('tets', $names);

        $data = $cache->get('tets');
        if(!$data) {
           $cache->set('tets', $names);
        }
        debug($data);
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
}