<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d923ac11d3d8eee3736a7064ddba95e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d923ac11d3d8eee3736a7064ddba95e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d923ac11d3d8eee3736a7064ddba95e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
