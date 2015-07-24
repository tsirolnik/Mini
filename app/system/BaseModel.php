<?php
namespace Mini;
/**
 *
 */


class BaseModel {

  function __construct() {
      global $config;
      $this->config = $config;
  }

}
