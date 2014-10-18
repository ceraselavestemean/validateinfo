<?php
class Helper_Route {
	public static function makeRoute($uri) {
	    $uri = new Helper_URI($uri);
		$route_info = array();

	    $route_info['page'] = ucfirst(strtolower($uri->getFirstSegment()));
            if(empty($route_info['page'])) {
	    	$route_info['page'] = DEFAULT_ROUTE_CONTROLLER;
	    }
	    $route_info['section']= ucfirst(strtolower($uri->getSegment(1)));
	    if(empty($route_info['section'])) {
	    	$route_info['section'] = SYSTEM_DEFAULT_ROUTE_SECTION;
	    }
	    $route_info['action'] = strtolower($uri->getSegment(2));
            if(empty($route_info['action'])) {
	    	$route_info['action'] = SYSTEM_DEFAULT_ROUTE_ACTION;
	    }
		
		$route_info['segments'] = $uri->getSegments();
		
	    return $route_info;
	}

	public static function invokeRoute($page = DEFAULT_ROUTE_CONTROLLER, $section = SYSTEM_DEFAULT_ROUTE_SECTION, $action = SYSTEM_DEFAULT_ROUTE_ACTION, $segments=array()) {
	

		$pagePath = DOC_ROOT.PAGES_ROOT.'/' . $page . '/';
		$pageGenericPath = PAGES_ROOT . '/'.$page . '/';
		$pageControllerPath = $pagePath . 'controller/';
		$pageControllerGenericPath = $pageGenericPath . 'controller/';
		
		// check if there is a base controller and load it
		if (!file_exists($pageControllerGenericPath . 'Controller.class.php')) {
			$action 	= 'not found';
		}

		$controllerClass =  $section .'Controller';
		if (file_exists($pageControllerGenericPath .$section .'Controller.class.php')){
			require_once($pageControllerGenericPath .$section .'Controller.class.php'); 
	}
	   
		
		if(file_exists($pageGenericPath . 'config.php')) {
			require_once($pageGenericPath . 'config.php');
		}	
		
		$controllerInstance = new $controllerClass($page);
		if (is_object($controllerInstance)){
			if (count($segments) <= 2)
				$controllerInstance->$action();
			else{
				$segmentNr = 3;	//where variable start in the link
				//call_user_func_array(array(&$controllerInstance, $action), array_slice($segments, $segmentNr));
			}
		}	
		
	}
}
