<?php

namespace src;

require_once 'Route.php';

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes[] = new Route($path, $callback);
    }

    public function dispatch(Application $app)
    {
        foreach ($this->routes as $route) {

            /**
             * @var Route $route
             */
            if ($route->currentURI() == $route->getPath()) {
                return $route->run($app);
            }
        }
        return 'Страница на найдена';
    }
}
