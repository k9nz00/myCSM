<?php

namespace App;

class Router
{
    private static $routes = [];

    public static function get($path, $callback)
    {
        self::$routes[] = new Route($path, $callback);
    }

    public function dispatch(Application $app)
    {
        foreach (self::$routes as $route)
        {
            /**@var Route $route */
            if ($route->currentURI() == $route->getPath())
            {
                return $route->run($app);
            }
        }

        return 'Страница на найдена';
    }
}

