<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1915984c940ace01ca0a3e7b67378d41
{
    public static $files = array (
        'bad75f8733a2d77fe11ebc93e9e8f761' => __DIR__ . '/../..' . '/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cms\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cms\\' => 
        array (
            0 => __DIR__ . '/..' . '/cms/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1915984c940ace01ca0a3e7b67378d41::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1915984c940ace01ca0a3e7b67378d41::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
