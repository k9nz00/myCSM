<?php

namespace App\Base\Routes\AbstractClass;

use App\Application;
use App\Base\Routes\Interfaces\RouteInterface;

abstract class Route implements RouteInterface
{
    protected $path;
    protected $callback;
    protected $method;

    public function __construct($path, $callback)
    {
        $this->path = '/' . trim($path, '/');
        $this->callback = $this->prepareCallback($callback);
        $this->method = $this->getMethod();
    }

    protected function prepareCallback($callback)
    {
        if (is_callable($callback)) {
            return $callback;
        }
        return function () use ($callback) {
            [$class, $method] = explode('@', $callback);
            return (new $class)->{$method}();
        };
    }

    public function getPath()
    {
        return $this->path;
    }

    public function match(): bool
    {
        //        $this->path = preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $this->path);
        $result =
            ($_SERVER['REQUEST_METHOD'] == $this->getMethod())
            && $this->getPath() == $this->currentURI()
            && $this->path = preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $this->path);

        return  $result;
    }

    public function currentURI(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function currentQuery(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    }

    public function run(Application $app)
    {
        return call_user_func_array($this->callback, [$app]);
    }

    abstract protected function getMethod(): string;
}