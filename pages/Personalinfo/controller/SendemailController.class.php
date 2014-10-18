<?php
class SendEmailController extends Controller {
	public function __construct($page) {
		parent::__construct($page);

		$this->sendEmails();
	}
	
	/**
	 * Send email
	 */
	public function sendEmails() {

 		$headers = 'From: admin@validinfo.visionet.ro' . "\r\n" .
                   'Reply-To: no-reply@validinfo.viaionet.ro' . "\r\n";
        mail($_SESSION['email'], "Personal Email", "Personal Info", $headers);
		$this->view->addSuccess('Sent email with success!');
		$this->view->display('emailsent.php', 'index');
		session_destroy();

	}
	

}