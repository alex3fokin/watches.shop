<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 05.01.2019
 * Time: 16:16
 */

namespace ishop;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function getRoute() {
        return self::$route;
    }

    public static function dispatch($url) {
        if(self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(class_exists($controller)) {
                $controllerObj = new $controller(self::$route);
                $action = self::$route['action'] . 'Action';
                if(method_exists($controllerObj, $action)) {
                    $controllerObj->$action();
                } else {
                    throw new \Exception("Метод $action контроллера $controller не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url) {
        foreach(self::$routes as $pattern => $route) {
            if(preg_match("#{$pattern}#", $url, $matches)) {
                foreach($matches as $key => $value) {
                    if(is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                $route['action'] = $route['action'] ?? 'index';
                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $rotue['prefix'] .= "\\";
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // CamelCase
    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    // camelCase
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }
}