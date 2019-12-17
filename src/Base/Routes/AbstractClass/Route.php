<?php

namespace App\Base\Routes\AbstractClass;

use App\Application;
use App\Base\Routes\Interfaces\RouteInterface;

abstract class Route implements RouteInterface
{
    protected $path;
    protected $callback;
    protected $method;
    protected $params;

    public function __construct($path, $callback)
    {
        $this->path = '/' . trim($path, '/');
        $this->callback = $this->prepareCallback($callback);
        $this->method = $this->getMethod();
        $this->params = $this->getParams($this->currentURI());
    }

    protected function prepareCallback($callback)
    {
        if (is_callable($callback)) {
            return $callback;
        }
        return function () use ($callback) {
            [$class, $method] = explode('@', $callback);
            if (!empty($this->params)) {
                return (new $class)->{$method}($this->params);
            }
            return (new $class)->{$method}();
        };
    }

    public function getPath()
    {
        return $this->path;
    }

    public function match(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == $this->getMethod()
            && $this->path = preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/',
                $this->currentURI());
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
        return call_user_func_array($this->callback, $this->params);
    }

    abstract protected function getMethod(): string;

    private function getParams(string $uri): array
    {
        $paths = explode('/', trim($this->path));
        $uris = explode('/', trim($uri));
        $params = [];
        for ($i = 0; $i < count($paths); $i++) {
            if ($paths[$i] == '*') {
                @$params[] = $uris[$i];
            }
        }
        return $params;
    }
}
