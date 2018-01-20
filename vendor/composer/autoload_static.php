<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba1ec64f3923ed9e0de958289174011e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba1ec64f3923ed9e0de958289174011e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba1ec64f3923ed9e0de958289174011e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
