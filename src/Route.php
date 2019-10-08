<?php

namespace App;

require_once 'src/controllers/MainController.php';

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
        if (is_callable($callback)) {
            return $callback;
        }
        return function () use ($callback) {
            list($class, $method) = explode('@', $callback);
            return (new $class)->{$method}();
        };
    }

    public function getPath()
    {
        return $this->path;
    }

    protected function getMethod()
    {
        return 'GET';
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