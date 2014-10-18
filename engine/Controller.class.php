<?php
class Controller {


     /**
	 * Current page
	 * Must be sent in every page main Controller 
	 * 
	 * @var string
	 */
	public $page = DEFAULT_ROUTE_CONTROLLER;

	/**
	 * Loaded Model instances
	 * 
	 * @var mixed
	 */
	public $model;
	
	/**
	 * View 
	 * 
	 * @var View
	 */
	public $view;

	public function __construct($page) {
		$this->model	 = new StdClass;
		$this->page	 = $page;
		$this->view = new View($this->page);
	}
	
	/*
	*	Load a model 
	*/
	public function loadModel($model) {
		if(isset($this->model->$model) && is_object($this->model->$model)){
			return true;
		}


		$pageModelPath = APP_ROOT . '/pages/' . $this->page . '/model/';
		$modelClass = $model.'Model';	
		
		
		if(file_exists($pageModelPath . $modelClass . '.class.php')) {
			require_once($pageModelPath . $modelClass . '.class.php');
		} 
		else {
			return false;
		}
		
		$this->model->$model = new $modelClass;
		$this->model->$model->pageStr = $this->page;
		$this->model->$model->passControllerObject($this); //call a function to pass all objects of controller
			
		return true;
	}

	public function __call($name, $arguments) {

//		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
//		$this->view->addError('Missing Page');
		
//		$this->view->display('error.php', 'index', false);
	}
	

}
