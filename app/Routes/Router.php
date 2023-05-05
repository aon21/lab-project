<?php

declare(strict_types=1);

namespace App\Routes;

class Router {

    private array $routes = [];

    public function addRoute(string $url, string $file): void
    {
        $this->routes[$url] = __DIR__ . '/../Views/' . $file;
    }

    public function route(): void
    {
        $url = $_SERVER['REQUEST_URI'];

        //add trailing slash if it doesn't exist
        if (!str_ends_with($url, '/')) {
            $url .= '/';
        }

        if (array_key_exists($url, $this->routes)) {
            include($this->routes[$url]);
        } else {
            header('HTTP/1.0 404 Not Found'); //TODO add 404 page template
            echo '404 Not Found';
        }
    }
}