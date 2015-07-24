<?php
namespace Mini;

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
    'twig_enable_cache' => true,
    'url_param'         => 'mini_url',
    'controller_sufix'  => 'Controller',
    'module_suffix'     => 'Module'
];

unset($base);
