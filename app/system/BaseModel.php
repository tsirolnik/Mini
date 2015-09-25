<?php
namespace Mini;
/**
 *
 */


class BaseModel {

  function __construct() {
      global $config;
      $this->moduleManager  = ModuleManager::getInstance($config);
      $this->config = $config;
  }

}
