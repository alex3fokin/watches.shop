<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 08.01.2019
 * Time: 19:22
 */

namespace ishop;


class Cache
{
    use TSingleton;

    public function set($key, $data, $seconds = 3600) {
        if($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if(file_put_contents(CACHE . DIRECTORY_SEPARATOR . md5($key) . ".txt", serialize($content))) {
                return true;
            }
        }

        return false;
    }

    public function get($key) {
        $file = CACHE . DIRECTORY_SEPARATOR . md5($key) . ".txt";
        if(file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if($content['end_time'] > time()) {
                return $content;
            }
            unlink($file);
        }

        return false;
    }

    public function delete($key) {
        $file = CACHE . DIRECTORY_SEPARATOR . md5($key) . ".txt";
        if(file_exists($file)) {
            unlink($file);
        }
    }
}