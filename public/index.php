<?php

define('BASE', realpath(__DIR__ . '/../'));

require_once BASE . '/vendor/autoload.php';

use App\Routes\Router;

$router = new Router();
$routes = require BASE . '/app/Routes/Routes.php';

if ($routes) {
    foreach ($routes as $route) {
        $router->addRoute($route['url'], $route['file']);
    }
}

$router->route();