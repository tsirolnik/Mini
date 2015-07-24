<?php
namespace Mini;


class BaseModule {
    function __construct() {
        global $config;
        $this->config = $config;
    }

}
