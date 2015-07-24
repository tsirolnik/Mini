<?php
namespace Mini;

/**

* We want to allow a module to use a module, so, in order to do that we use a
* singleton based class to prevent the reloading of an already loaded modules.

**/

class ModuleManager {

    private static $instance;

    public static function getInstance(&$config=NULL)    {
        if (NULL === self::$instance) {
            self::$instance = new ModuleManager($config);
        }

        return self::$instance;
    }

    /*
    * We don't want people to inherit our class.
    */
    private function __construct(&$config)    {
        $this->config = $config;
    }

    public function getModule($moduleName)    {
        if(isset($this->modules[$moduleName])) {
            return $this->modules[$moduleName];
        }
        return NULL;
    }

    public function loadModule($moduleName, $args=[]) {
        // Check if the module have been already loaded
        if(isset($this->modules[$moduleName])) {
            return $this->modules[$moduleName];
        }

        $moduleFile = $this->config['dir_modules'] . $moduleName . $this->config['module_suffix'] . ".php";
        if (file_exists($moduleFile)) {
            require_once($moduleFile);
            $reflect = new \ReflectionClass(ucfirst($moduleName));

            $this->modules[$moduleName] = $reflect->newInstanceWithoutConstructor();

            call_user_func_array(array($this->modules[$moduleName], "__construct"), $args);

            return $this->modules[$moduleName];
        } else {
            echo 'Module does\'nt exist.';
        }
    }
}
