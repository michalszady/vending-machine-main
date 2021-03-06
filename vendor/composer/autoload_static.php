<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5339dfad6678ba6874df883e6ddee6cc
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VendingMachine\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VendingMachine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5339dfad6678ba6874df883e6ddee6cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5339dfad6678ba6874df883e6ddee6cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5339dfad6678ba6874df883e6ddee6cc::$classMap;

        }, null, ClassLoader::class);
    }
}
