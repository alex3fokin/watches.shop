<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 07.01.2019
 * Time: 21:50
 */

namespace ishop\base;


class View
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->view = $view;
        $this->meta = $meta;

        if($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data) {
        if(is_array($data)) {
            extract($data);
        }
        $viewFile = APP . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $this->prefix . $this->controller . DIRECTORY_SEPARATOR . $this->view . '.php';
        if(is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }

        if($this->layout !== false) {
            $layoutFile = APP . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "layouts" . DIRECTORY_SEPARATOR . $this->layout . ".php";

            if(is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }
    }

    public function getMeta() {
        $meta = '';
        foreach($this->meta as $name => $value) {
            if($name === 'title') {
                $meta .= "<title>" . $value . "</title>\n";
            } else {
                $meta .= "<meta name='" . $name . "' content='" . $value . "'>\n";
            }
        }

        return $meta;
    }
}