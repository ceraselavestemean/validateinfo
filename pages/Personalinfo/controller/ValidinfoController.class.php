<?php
class ValidInfoController extends Controller {
	public function __construct($page) {
		parent::__construct($page);
		//$this->loadModel('PersonalInfo');

		$this->view->addJs('validEmail.js');
		$this->index();
	}
	
	/**
	 * Main Display Page
	 */
	public function index() {

		$sendEmail = false;
		$countryList = array("FR"=>"France","UK"=>"United Kindom");
		$townList = array('1'=>'Paris',2=>'London');
		$validPost = true;   
    	
    	// firstname
    	$firstname = (isset($_POST['firstname']) ? trim($_POST['firstname']) : '');
    	if(empty($firstname)) {
    		$this->view->addWarning('Please provide a FirstName');
    		$validPost = false;
    	} elseif(!Helper_Validate::isValidStringLenght($firstname, 2, 100)) {
    		$this->view->addWarning('Firstname must contain maximum 100 characters');
    		$validPost = false;
    	}

    	// lastName
    	$lastname = (isset($_POST['lastname']) ? trim($_POST['lastname']) : '');
    	if(empty($lastname)) {
    		$this->view->addWarning('Please provide a Last Name');
    		$validPost = false;
    	} elseif(!Helper_Validate::isValidStringLenght($lastname, 2, 100)) {
    		$this->view->addWarning('Lastname must contain maximum 100 characters');
    		$validPost = false;
    	} 
    	
    	//email
    	$email = (isset($_POST['email']) ? trim($_POST['email']) : '');
    	if(empty($email)) {
    		$this->view->addWarning('Please provide an Email!');
    		$validPost = false;
    	} elseif(!Helper_Validate::isValidEmail($email)) {
    		$this->view->addWarning('Please specify a valid Sender Email Address!');
    		$validPost = false;
    	} 
    	
    	//confirmemail
    	$confirmemail = (isset($_POST['confirmemail']) ? trim($_POST['confirmemail']) : '');
    	if(empty($confirmemail)) {
    		$this->view->addWarning('Please provide an Confirmed Email!');
    		$validPost = false;
    	} elseif(!Helper_Validate::isValidEmail($confirmemail)) {
    		$this->view->addWarning('Please specify a valid Sender Email Address!');
    		$validPost = false;
    	} 

    	if ($email != $confirmemail){
    		$this->view->addWarning('Email and confirm email should be the same!');
    		$validPost = false;
    	}

        //country validation
    	$countryISO = (isset($_POST['country']) ? trim($_POST['country']) : '');
    	if($countryISO == '0') {
    		$this->view->addWarning('Please choose a Country!');
    		$validPost = false;
    	}

    	//town validation
    	$townId = (isset($_POST['town']) ? trim($_POST['town']) : '');
    	if($townId == 0) {
    		$this->view->addWarning('Please choose a Town!');
    		$validPost = false;
    	}

    	
    	$this->view->assign('firstname', $firstname);
        $this->view->assign('lastname', $lastname);
        $this->view->assign('email', $email);
        $this->view->assign('confirmemail', $confirmemail);
        $this->view->assign('townId', $townId);
        $this->view->assign('countryISO', $countryISO);
		$this->view->assign('country', $countryList);
		$this->view->assign('sendEmailButton', $sendEmail);
		$this->view->assign('town', $townList);

        if($validPost) {
            $sendEmail = true;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['confirmemail'] = $confirmemail;
            $_SESSION['countryISO'] = $countryISO;
            $_SESSION['townId'] = $townId;
            $this->view->addSuccess('Information are ready to be send!');
            $this->view->display('sendEmail.php', 'index');
   
        }
        else{
		  $this->view->display('validInfo.php', 'index');
		}
	}

}