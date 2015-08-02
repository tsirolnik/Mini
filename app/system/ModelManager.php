<?php
namespace Mini;

/**

* We want to allow a model to use a model, so, in order to do that we use a
* singleton based class to prevent the reloading of an already loaded models.

**/

class ModelManager {

    private static $instance;

    public static function getInstance(&$config=NULL)    {
        if (NULL === self::$instance) {
            self::$instance = new ModelManager();
        }

        return self::$instance;
    }

    /*
    * We don't want people to inherit our class.
    */
    private function __construct()    {
        global $config;
        $this->config = $config;
    }

    public function getmodel($modelName)    {
        if(isset($this->models[$modelName])) {
            return $modelName;
        }
        return NULL;
    }

    public function loadmodel($modelName, $args=[]) {

        $modelFile = $this->config['dir_models'] . "/" . $modelName . ".php";

        if (file_exists($modelFile)) {
            require_once($modelFile);
            $reflect = new \ReflectionClass($modelName);

            $this->models[$modelName] = $reflect->newInstanceWithoutConstructor();

            call_user_func_array(array($this->models[$modelName], "__construct"), $args);

            return $this->models[$modelName];
        } else {
            echo 'Model ' . $modelName . ' not found.';
            echo 'Model file looked for "' . $modelFile . '"';
        }
    }
}
