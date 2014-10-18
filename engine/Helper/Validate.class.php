<?php
class Helper_Validate {
	
	/**
	 * Check if Valid Email
	 * 
	 * @param string	$email
	 * @return bool
	 */
	public static function isValidEmail($email) {
		if(!$email || strlen($email = trim($email)) == 0){
			return false;
		}

		$regex = "^[_+a-zA-Z0-9-]+(\.[_+a-zA-Z0-9-]+)*"
                 ."@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]{1,})*"
                 ."\.([a-zA-Z]{2,}){1}$";
		
		if (preg_match('/'.$regex.'/', $email)== 0){
			return false;
		}		

		/* Verify Email Domain */
		if(function_exists('checkdnsrr')) {
			$emailDomainPos = strpos($email, '@');
			if(false===$emailDomainPos) { 
				return false;
			}
			$emailDomain = substr($email, (false === $emailDomainPos ? 0 : $emailDomainPos+1));
			return checkdnsrr($emailDomain);
		}
		
		return true;
	}
	
	

	/**
	 * Check if Valid String Length
	 * 
	 * @param string	$string
	 * @param int		$lower_limit
	 * @param int		$upper_limit (Optional, 0 = unlimited)
	 * @return bool
	 */
	public static function isValidStringLenght($string, $lower_limit, $upper_limit = 0) {
	    if(strlen($string) < $lower_limit) {
			return false;
		}
		
		if($upper_limit && strlen($string) > $upper_limit) {
			return false;
		}

		return true;
	}

}