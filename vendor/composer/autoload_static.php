<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit372c8eee01b3c0c03e3abe7e22632982
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'model\\' => 6,
            'model/hr\\' => 9,
            'model/email\\' => 12,
            'model/candidate\\' => 16,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'model/hr\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/hr',
        ),
        'model/email\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/email',
        ),
        'model/candidate\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model/candidate',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit372c8eee01b3c0c03e3abe7e22632982::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit372c8eee01b3c0c03e3abe7e22632982::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
