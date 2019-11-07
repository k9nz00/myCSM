<?php

namespace App;

use App\Exception\NotFoundException;

class Router
{
    private static $routes = [];

    public static function get($path, $callback)
    {
        self::$routes[] = new Route($path, $callback);
    }

    public function dispatch(Application $app)
    {
        $routeFound = false;
        foreach (self::$routes as $route) {
            /**@var Route $route */
            if ($route->currentURI() == $route->getPath()) {
                $routeFound = true;
                return $route->run($app);
            }
        }

        if ($routeFound == false) {
            throw new NotFoundException('Страница не найдена', 404);
        }
    }
}

