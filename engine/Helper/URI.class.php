<?php
class Helper_URI {	
	protected $url = null;
	protected $request_uri = null;
	protected $path_info = null;
	protected $query_string = null;
	protected $query_array = array();
	protected $url_parts = array();
	protected $url_path_segments = array();
	
	public function __construct($url){
		$this->loadURI($url);
	}
	
	public function loadURI($url) {
	    $this->url = $url;
	    $this->url_parts = parse_url($this->url);

	    if(false === $this->url_parts) throw new Helper_URIException('Url parsing failed : '.$url);
	    
		$this->path_info = $this->url_parts['path'];
		$this->request_uri = $this->url_parts['path'];
		$this->query_string = null;
		$this->query_string = array();
		if(!empty($this->url_parts['query'])){
			$this->request_uri .= '?'.$this->url_parts['query'];
			$this->query_string = $this->url_parts['query'];
			parse_str($this->url_parts['query'], $this->query_array);
		}
		
		$uri_path = $this->url_parts['path'];
		if(0 === strpos($this->url_parts['path'], HTACCESS_REWRITE_BASE)) {
			$uri_path = substr($uri_path, strlen(HTACCESS_REWRITE_BASE));
		}
		$uri_path=rtrim(ltrim($uri_path,'/'),'/');
		
		$this->url_path_segments = explode('/', $uri_path);
	}
	
	public function getSegment($section) {
		return isset($this->url_path_segments[$section]) ? $this->url_path_segments[$section] : false;
	}
	
	public function getLastSegment(){
		if(empty($this->url_path_segments)) {
			return false;
		}
		
		return $this->url_path_segments[count($this->url_path_segments) - 1];
	}
	
	public function getSegments(){
		return $this->url_path_segments;
	}	

	public function getFirstSegment(){
	    if(empty($this->url_path_segments)) {
			return false;
		}
		
		return $this->url_path_segments[0];
	}
	
	
	public static function redirect($url) {
		if (!headers_sent()) {
		  	header('Location: '. $url);
		} else {
			echo '<script>window.location.href = "'.$url.'";</script>';
		}
		exit();
	}
}