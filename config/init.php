<?php
/**
 * Created by PhpStorm.
 * User: alex3
 * Date: 03.01.2019
 * Time: 19:21
 */
define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . DIRECTORY_SEPARATOR . "public");
define("APP", ROOT . DIRECTORY_SEPARATOR . "app");
define("CORE", ROOT . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "ishop" . DIRECTORY_SEPARATOR . "core");
define("LIBS", ROOT . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "ishop" . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "libs");
define("CACHE", ROOT . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR . "cache");
define("CONFIG", ROOT . DIRECTORY_SEPARATOR . "config");
define("LAYOUT", "default");

// http://ishop/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://ishop/public
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://ishop
$app_path = str_replace("/public/", '', $app_path);

define("APP_URL", $app_path);
define("ADMIN_URL", $app_path . "/admin");

require_once ROOT . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";