<?php
class Model {
	/**
	 * Current Page
	 * Must be sent in every module main Controller 
	 * 
	 * @see passed from Controller
	 * @var string
	 */
	public $page = DEFAULT_ROUTE_CONTROLLER;

	/**
	 * Loaded Model instances
	 * 
	 * @see passed from Controller
	 * @var mixed
	 */
	public $model;

	/**
	 * View 
	 * 
	 * @see passed from Controller
	 * @var View
	 */
	public $view;
	
	
	public function __construct() 
	{
	}
	
	public function passControllerObject($object) 
	{
		//need a function to build array of objects in this class and keep them if they are passed thoruoght the controller also
		foreach($object as $k => $v) {
			$this->$k = $v;
		}
	}
	
}