<?php
class MainController extends Controller {
	public function __construct($page) {
		parent::__construct($page);
		$this->index();
	}
	
	/**
	 * Main Display Page
	 */
	public function index() {


		$sendEmail = false;
		$countryList = array("FR"=>"France","UK"=>"United Kindom");
		$townList = array('1'=>'Paris',2=>'London');

		if (isset($_SESSION['firstname'])){
			$firstname = $_SESSION['firstname'];
		}
		else{
			$firstname = '';
		}	
		if (isset($_SESSION['lastname'])){
			$lastname = $_SESSION['lastname'];
		}
		else {
			$lastname = '';
		}
		if (isset($_SESSION['email'])){
			$email = $_SESSION['email'];
		}
		else {
			$email = '';
		}
		if (isset($_SESSION['confirmemail'])){
			$confirmemail = $_SESSION['confirmemail'];
		}
		else {
			$confirmemail = '';
		}
		if (isset($_SESSION['townId'])){
			$townId = $_SESSION['townId'];
		}
		else {
			$townId = '';
		}
		if (isset($_SESSION['countryISO'])){
			$countryISO = $_SESSION['countryISO'];
		}
		else {
			$countryISO = '';
		}

		
		$this->view->assign('firstname', $firstname);
    	$this->view->assign('lastname', $lastname);
    	$this->view->assign('email', $email);
   		$this->view->assign('confirmemail', $confirmemail);
    	$this->view->assign('townId', $townId);
    	$this->view->assign('countryISO', $countryISO);
		$this->view->assign('country', $countryList);
		$this->view->assign('town', $townList);
		$this->view->assign('sendEmailButton', $sendEmail);
		$this->view->display('index.php', 'index');

		
	}
	

}