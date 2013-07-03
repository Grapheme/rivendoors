<?php if(!defined('BASEPATH')) exit('no direct scripting allowed');

class Page_variables {
	
	var $head = array(
		'home' => array('title'=>'Главная страница','description'=>'Главная страница'),
		'about' => array('title'=>'О компании','description'=>'О компании'),
		'contacts' => array('title'=>'Контакты','description'=>'Контакты'),
		'entrance-doors' => array('title'=>'Входные двери','description'=>'Входные двери'),
		'interior-doors' => array('title'=>'Межкомнатные двери','description'=>'Межкомнатные двери'),
		'dekor' => array('title'=>'Декор','description'=>'Декор'),
		'parket' => array('title'=>'Паркет','description'=>'Паркет'),
	);
	
	public function __construct(){
		
		$this->CI = & get_instance();
	}

	public function getPageTitle($url = ''){
		
		if(empty($url)):
			return $this->head['home']['title'];
		elseif(isset($this->head[$url]['title'])):
			return $this->head[$url]['title'];
		else:
			return '';
		endif;
	}
	
	public function getPageDescription($url = ''){
		
		if(empty($url)):
			return $this->head['home']['description'];
		elseif(isset($this->head[$url]['description'])):
			return $this->head[$url]['description'];
		else:
			return '';
		endif;
	}
}
?>