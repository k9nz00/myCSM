<?php

namespace App;

final class Config
{
    /** @var array $configs */
    protected $configs;

    protected static $instance;

    private function __construct()
    {
        $this->configs = require_once 'configs/db.php';
    }

    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function getConfig(array $config, $default = null)
    {
        arrayGet($this->configs, $config);
    }
}

