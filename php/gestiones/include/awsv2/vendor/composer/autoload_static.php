<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1949cfae31889cc8b798ddc37cb2547
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\EventDispatcher\\' => 34,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Guzzle\\Tests' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/tests',
            ),
            'Guzzle' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/src',
            ),
        ),
        'A' => 
        array (
            'Aws' => 
            array (
                0 => __DIR__ . '/..' . '/aws/aws-sdk-php/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1949cfae31889cc8b798ddc37cb2547::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1949cfae31889cc8b798ddc37cb2547::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf1949cfae31889cc8b798ddc37cb2547::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf1949cfae31889cc8b798ddc37cb2547::$classMap;

        }, null, ClassLoader::class);
    }
}