<?php

require_once dirname(__DIR__) . '/lab-project/vendor/autoload.php';

use App\Routes\Router;

$router = new Router();
$routes = require __DIR__ . '/app/Routes/Routes.php';

if ($routes) {
    foreach ($routes as $route) {
        $router->addRoute($route['url'], $route['file']);
    }
}

$router->route();