<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define("ROOT", __DIR__);

spl_autoload_register(function($class_name) {
	if(file_exists('models/'.$class_name.'.php')){
		require_once 'models/'.$class_name.'.php';
	} else if (file_exists('controllers/'.$class_name.'.php')){
		require_once 'controllers/'.$class_name.'.php';
	}
});
		

require_once('views/layout.php');

?>