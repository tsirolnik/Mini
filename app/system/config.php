<?php
namespace Mini;
// Force HTTP only cookies
ini_set('session.cookie_httponly', 1);
$base = realpath(dirname(__FILE__) . '/../..') . '/';

$config = [
    'dir_base'          => $base,
    'dir_system'        => $base . 'app/system/',
    'dir_controllers'   => $base . 'app/controllers/',
    'dir_modules'       => $base . 'app/modules/',
    'dir_models'        => $base . 'app/models/',
    'dir_views'         => $base . 'app/views/',
    'dir_plugins'       => $base . 'app/plugins/',
    'dir_twig_cache'    => $base . 'app/system/Twig/TwigCache',
    'twig_enable_cache' => false,
    'url_param'         => 'mini_url',
    'controller_sufix'  => 'Controller',
    'module_suffix'     => 'Module',
    'model_suffix'      => 'Model',
    'db'                => [
                'host'      => 'localhost',
                'name'      => 'database',
                'user'      => 'root',
                'password'  => '123456'
        ]
];

unset($base);
