<?php
class View {
	protected $__config = array(
			'body' => null,
			'css' => array(),
			'jss' => array(),
			'theme' => '',
			'page' => '',
			'errors' => array(),
			'warnings' => array(),
			'successes' => array(),
			'infos' => array(),
		);
	
	public function __construct($page) {
		$this->__config['page'] = $page;
		
		// add server specific CSS - before the rest of particular css files
		if(file_exists(APP_ROOT.'/themes/default/css/main.css')) {
			$this->__config['css'][] = APP_URL.'/themes/default/css/main.css';
		}
	}
	
	
	
	/**
	 * Create url
	 * 
	 * @param string	$path	Path of the url
	 * @param string	$page	Page to insert in url
	 * @return string
	 */
	public function url($path = '', $page = null) {
		if (empty($page)) {
			$page = $this->__config['page'];
		} 
		
		return rtrim(SITE_URL.'/'.$page.'/'.$path, '/');
	}		
	
	public function addCss($value) {
		$this->__config['css'][] = $this->cssPath($value);
	}
	
	public function addJs($value, $page = true ) {
		$this->__config['jss'][] = ($page ? $this->jsPagePath($value) : $this->jsPath($value));
	}
	
	public function jsPagePath($path = '', $isSystem=false) {
		
		if(file_exists(APP_ROOT.'pages/'.$this->__config['page'].'/view/js/'.$path)) {
			return APP_URL.'/pages/'.$this->__config['page'].'/view/js/'.$path;
		}
		return PAGES_URL.$this->__config['page'].'/view/js/'.$path;
	}
	public function addError($message) {
		if(!isset($_SESSION[SYSTEM_SESSION_SALT.'errors']) || !is_array($_SESSION[SYSTEM_SESSION_SALT.'errors'])) {
			$_SESSION[SYSTEM_SESSION_SALT.'errors'] = array();
		}
		$_SESSION[SYSTEM_SESSION_SALT.'errors'][] = $message;
	}
	
	public function addWarning($message) {
		if(!isset($_SESSION[SYSTEM_SESSION_SALT.'warnings']) || !is_array($_SESSION[SYSTEM_SESSION_SALT.'warnings'])) {
			$_SESSION[SYSTEM_SESSION_SALT.'warnings'] = array();
		}
		$_SESSION[SYSTEM_SESSION_SALT.'warnings'][] = $message;
	}
	
	public function addSuccess($message) {
		if(!isset($_SESSION[SYSTEM_SESSION_SALT.'successes']) || !is_array($_SESSION[SYSTEM_SESSION_SALT.'successes'])) {
			$_SESSION[SYSTEM_SESSION_SALT.'successes'] = array();
		}
		$_SESSION[SYSTEM_SESSION_SALT.'successes'][] = $message;
	}
	

	/**
	 * Display
	 * 
	 * @param string	$body				Body Template
	 * @param string	$main_template		Main Wrapper Template
	 * @param bool 		$return				Return Output Flag (false = outputs, true = returns generated html)
	 * @return Generated Output (only if $return is set on true)
	 */
	public function display($body, $main_template = 'index', $return = false) {

		// populate errors, warnings, successes, infos
		if(isset($_SESSION[SYSTEM_SESSION_SALT.'errors'])) {
			$this->__config['errors'] = $_SESSION[SYSTEM_SESSION_SALT.'errors'];
			$_SESSION[SYSTEM_SESSION_SALT.'errors']=array(); unset($_SESSION[SYSTEM_SESSION_SALT.'errors']);
		}
		if(isset($_SESSION[SYSTEM_SESSION_SALT.'warnings'])) {
			$this->__config['warnings'] = $_SESSION[SYSTEM_SESSION_SALT.'warnings'];
			$_SESSION[SYSTEM_SESSION_SALT.'errors']=array(); unset($_SESSION[SYSTEM_SESSION_SALT.'warnings']);
		}
		if(isset($_SESSION[SYSTEM_SESSION_SALT.'successes'])) {
			$this->__config['successes'] = $_SESSION[SYSTEM_SESSION_SALT.'successes'];
			$_SESSION[SYSTEM_SESSION_SALT.'successes']=array(); unset($_SESSION[SYSTEM_SESSION_SALT.'successes']);
		}
		if(isset($_SESSION[SYSTEM_SESSION_SALT.'infos'])) {
			$this->__config['infos'] = $_SESSION[SYSTEM_SESSION_SALT.'infos'];
			$_SESSION[SYSTEM_SESSION_SALT.'infos']=array(); unset($_SESSION[SYSTEM_SESSION_SALT.'infos']);
		}
		

		$this->__config['body'] = $body;
		
		if($return) {
			ob_start();
		}
		include(THEMES_ROOT.'default/'.$main_template.'.php');
		if($return) {
			return ob_get_clean();
		}
		
		return true;
	}
	
	public function themeFilePath($path = '') {

		if(file_exists(DOC_ROOT.'/themes/default/'.$path)) {
			return DOC_ROOT.'/themes/default/'.$path;
		}
		return THEMES_ROOT.'default/'.$path;
	}
	
	public function themePath($path = '') {
		if(file_exists(APP_ROOT.'/themes/default/'.$path)) {
			return APP_URL.'/themes/default/'.$path;
		}
		return THEMES_URL.'default/'.$path;
	}


	public function cssPath($path = '') {
		if(file_exists(APP_ROOT.'/themes/default/css/'.$path)) {
			return APP_URL.'/themes/default/css/'.$path;
		}
		return THEMES_URL.'default/css/'.$path;
	}
	
	public function jsPath($path = '') {
		if(file_exists(APP_ROOT.'/themes/default/js/'.$path)) {
			return APP_URL.'/themes/default/js/'.$path;
		}
		return THEMES_URL.'default/js/'.$path;
	}
	

	public function filePagePath($path = '') {
	    if(file_exists(APP_ROOT.'/pages/'.$this->__config['page'].'/'.$path)) {
	        return APP_URL.'/pages/'.$this->__config['page'].'/'.$path;
	    }
	    return PAGE_URL.$this->__config['page'].'/'.$path;
	}	
	

	public function imagePath($path = '') {
		if(file_exists(APP_ROOT.'/themes/default/img/'.$path)) {
			return APP_URL.'/themes/default/img/'.$path;
		}

		return THEMES_URL.'default/img/'.$path;
	}

	public function viewPageFilePath($path = '') {

	    return DOC_ROOT.'pages/'.$this->__config['page'].'/view/'.$this->__config['body'];
	}	

	/**
	 * Assign Variable
	 * 
	 * @param string	$key	Template Variable Key
	 * @param mixed		$var	Variable
	 * @return bool
	 */
	public function assign($key, $var) {
		if(!is_string($key) || '__config' == $key) {
			return false;
		}
		
		$this->$key = $var;
		return true;
	}
}