<?php
namespace Mini;

// Get the configuration file first.
require('./app/system/config.php');
require($config['dir_system'] . 'SqlManager.php');
require($config['dir_system'] . 'BaseController.php');
require($config['dir_system'] . 'BaseModule.php');
require($config['dir_system'] . 'BaseModel.php');
require($config['dir_system'] . 'ModuleManager.php');
require($config['dir_system'] . 'ModelManager.php');
require($config['dir_system'] . 'ViewManager.php');

$url = [];
if(!empty($_GET[$config['url_param']])) {
	$url = explode("/", $_GET[$config['url_param']]);
}

// Routing data "storage"
$route = [
		'index', // Default controller
		'main'  // Default method
	];

// Location of the route...
$location = 0;
// Bind the url to the route
foreach ($url as $key => $value) {
	if(!empty($value)) {
		$route[$location] = $value;
	}
	$location++;
}

$controllerFile = $config['dir_controllers'] . $route[0] . $config['controller_sufix'] . '.php';
if(file_exists($controllerFile)) {
	require_once($controllerFile);
	$route[0] = ucfirst($route[0]);
	// Create a new instance of the controller
	$controllerInstance = new $route[0]();
	if(method_exists($controllerInstance, $route[1])) {
		call_user_func_array(array($controllerInstance, $route[1]), array_slice($route, 2));
	} else {
		echo 'Controller\'s method does\'nt exist.';
	}
} else {
	echo 'Controller not found';
}
