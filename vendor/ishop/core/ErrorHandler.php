<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 05.01.2019
 * Time: 15:08
 */

namespace ishop;


class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date("Y-m-d H:i:s") . "] Текст ошибки: {$message}\n Файл: {$file}\n Строка: {$line}\n\n=============================================\n\n", 3, ROOT . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR . "errors.log");
    }

    protected function displayError($error_number, $error_text, $error_file, $error_line, $response_http_code = 404) {
        http_response_code($response_http_code);
        if($response_http_code === 404 && !DEBUG) {
            require WWW . DIRECTORY_SEPARATOR . "errors" . DIRECTORY_SEPARATOR . "404.php";
            die;
        }

        if(DEBUG) {
            require WWW . DIRECTORY_SEPARATOR . "errors" . DIRECTORY_SEPARATOR . "dev.php";
        } else {
            require WWW . DIRECTORY_SEPARATOR . "errors" . DIRECTORY_SEPARATOR . "prod.php";
        }

        die;
    }
}