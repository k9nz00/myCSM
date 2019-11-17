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

        /**
         * @fixme доработать - ошибочный url должен показывать (при наличии get параметры)
         */
        if ($routeFound == false) {
            throw new NotFoundException('Страница по адресу ' . '\'' . $_SERVER['REQUEST_URI'] . '\'' . ' не найдена',
                404);
        }
    }
}

