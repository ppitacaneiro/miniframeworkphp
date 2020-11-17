<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0235d3e1a99e2e044d6266eebafe8ca3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0235d3e1a99e2e044d6266eebafe8ca3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0235d3e1a99e2e044d6266eebafe8ca3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
