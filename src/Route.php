<?php

namespace App;

class Route
{
    private $path;
    private $callback;

    public function __construct($path, $callback)
    {
        $this->path = '/' . trim($path, '/');
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback($callback)
    {
        if (is_callable($callback))
        {
            return $callback;
        }
        return function () use ($callback)
        {
            list($class, $method) = explode('@', $callback);
            return (new $class)->{$method}();
        };
    }

    public function getPath()
    {
        return $this->path;
    }

    public function currentURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function run(Application $app)
    {
        return call_user_func_array($this->callback, [$app]);
    }
}
