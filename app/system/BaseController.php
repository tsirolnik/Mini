<?php
namespace Mini;

/**
 *
 * A valid controller declartion is in the next form -
 *  class ControllerName extends BaseController
 * The controllers first letter should be a capital letter.
 * Can't undestarnt why? Learn to code.
 *
 * The controller **MUST** have a method named "main".
 * This is order to have a default controller layout.
 */
class BaseController
{

  protected  $moduleMnager;
  protected  $modelManager;
  protected  $viewManager;

  public function __construct() {
      global $config;
      $this->config = $config;
      $this->moduleManager  = ModuleManager::getInstance($config);
      $this->modelManager   = ModelManager::getInstance($config);
      $this->viewManager    = new ViewManager($config);
  }


}
