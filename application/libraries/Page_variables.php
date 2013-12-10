<?php if(!defined('BASEPATH')) exit('no direct scripting allowed');

class Page_variables {
	
	var $CI = '';
	
	public function __construct(){
		
		$this->CI = & get_instance();
	}

	public function getPageTitle(){
		
		$this->CI->load->model(array('pages','manufacturers'));
		$record = array();
		switch($this->CI->uri->total_segments()):
			case 0: $record = $this->CI->pages->getWhere(NULL,array('url'=>'home')); break;
			case 2:
				if(uri_string() == 'parket/parketoff'):
					$record = $this->CI->pages->getWhere(NULL,array('url'=>uri_string()));
				elseif($this->CI->uri->segment(1) !== FALSE && array_search($this->CI->uri->segment(1),$this->CI->categoriesURL)):
					$categoryID = array_search($this->CI->uri->segment(1),$this->CI->categoriesURL);
					$record = $this->CI->manufacturers->getWhere(NULL,array('category'=>$categoryID,'translit'=>$this->CI->uri->segment(2)));
				endif;
				break;
			default: $record = $this->CI->pages->getWhere(NULL,array('url'=>uri_string())); break;
		endswitch;
		if(!empty($record)):
			return htmlspecialchars($record['page_title']);
		else:
			return '';
		endif;
	}
	
	public function getPageDescription($url = 'home',$model = 'pages'){
		
		$this->CI->load->model(array('pages','manufacturers'));
		$record = array();
		switch($this->CI->uri->total_segments()):
			case 1: $record = $this->CI->pages->getWhere(NULL,array('url'=>$this->CI->uri->segment(1))); break;
			case 2:
				if(uri_string() == 'parket/parketoff'):
					$record = $this->CI->pages->getWhere(NULL,array('url'=>uri_string()));
				elseif($this->CI->uri->segment(1) !== FALSE && array_search($this->CI->uri->segment(1),$this->CI->categoriesURL)):
					$categoryID = array_search($this->CI->uri->segment(1),$this->CI->categoriesURL);
					$record = $this->CI->manufacturers->getWhere(NULL,array('category'=>$categoryID,'translit'=>$this->CI->uri->segment(2)));
				endif;
				break;
			default: $record = $this->CI->pages->getWhere(NULL,array('url'=>'home')); break;
		endswitch;
		if(!empty($record)):
			return htmlspecialchars($record['page_description']);
		else:
			return '';
		endif;
	}
}
?>