<?php
namespace Mini;
  /**
   * ViewManager -
   *
   */



  class ViewManager {

    private     $data;
    private     $viewFolder;

    function __construct() {
        global $config;
        $this->config = $config;
        $this->data = [];

        // Load Twig...
        require_once($config['dir_system'] . 'Twig/Autoloader.php');
        \Twig_Autoloader::register();
    }

    function setViewFolder($view) {
        $this->viewFolder = $view;
        $loader = new \Twig_Loader_Filesystem($this->config['dir_views'] . $this->viewFolder);
        $this->twig = new \Twig_Environment($loader, [
            'cache' => $this->config['dir_twig_cache'],
            'auto_reload' => !$this->config['twig_enable_cache']
        ]);
    }

    function loadView($view) {
        if(file_exists($this->config['dir_views'] . $this->viewFolder . '/' . $view)) {
            echo $this->twig->render($view, $this->data);
        }
    }

    function bind($name, $value) {
        $this->data[$name] = $value;
    }

    function bindSet($bindingSet) {
      $this->data += $bindingSet;
    }

    function clearBinding() {
        $this->data = [];
    }

  }
