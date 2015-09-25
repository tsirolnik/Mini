<?php
namespace Mini;
  /**
   * ViewManager -
   *
   */



  class ViewManager {

    private     $data;
    private     $viewFolder;

    public function __construct() {
        global $config;
        $this->config = $config;
        $this->data = [];

        // Load Twig...
        require_once($config['dir_system'] . 'Twig/Autoloader.php');
        \Twig_Autoloader::register();
    }

    public function setViewFolder($view) {
        $this->viewFolder = $view;
        $loader = new \Twig_Loader_Filesystem($this->config['dir_views'] . $this->viewFolder);
        $this->twig = new \Twig_Environment($loader, [
            'cache' => $this->config['dir_twig_cache'],
            'auto_reload' => !$this->config['twig_enable_cache']
        ]);
    }

    public function loadView($view) {
        if(file_exists($this->config['dir_views'] . $this->viewFolder . '/' . $view)) {
            echo $this->twig->render($view, $this->data);
        }
    }

    public function bind($name, $value) {
        $this->data[$name] = $value;
    }

    public function bindSet($bindingSet) {
      $this->data += $bindingSet;
    }

    public function clearBinding() {
        $this->data = [];
    }

    public function redirect($direction) {
        header("Location: $direction");
        die();
    }

  }
