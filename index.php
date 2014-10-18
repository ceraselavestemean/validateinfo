<?php
session_start();

if(get_magic_quotes_gpc()) {
	array_walk_recursive($_POST, create_function('&$val', '$val = stripslashes($val);'));
	array_walk_recursive($_GET, create_function('&$val', '$val = stripslashes($val);'));
	array_walk_recursive($_REQUEST, create_function('&$val', '$val = stripslashes($val);'));
}

// load base config
if(!file_exists('config/base.config.php')) {
	die('Failed to load Base Config!!!');
} 
require_once('config/base.config.php');


try {
	$route = Helper_Route::makeRoute($_SERVER['REQUEST_URI']);
	Helper_Route::invokeRoute($route['page'], $route['section'], $route['action'], $route['segments']);
} catch (Exception $e) {
	echo '<h3>Error</h3>';
}
//autoload only core classes
function __autoload($class) {
	$classPath = str_replace('_', '/', $class);
	if(file_exists(CORE_ROOT . $classPath . '.class.php')) {
		require_once(CORE_ROOT . $classPath . '.class.php');
	}
}