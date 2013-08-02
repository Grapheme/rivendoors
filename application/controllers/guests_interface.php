<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	
	function __construct(){

		parent::__construct();
		$this->load->library('page_variables');
	}
	
	public function index(){
		
		$pagevar = $this->loadManufacturers();
		$this->load->view("guests_interface/index",$pagevar);
	}
	
	public function seo(){

		$pagevar = $this->loadManufacturers();
		$this->load->model(array('pages','page_resources'));
		if($pagevar['content'] = $this->pages->getWhere(NULL,array('url'=>uri_string()))):
			$pagevar['images'] = $this->page_resources->getWhere(NULL,array('page'=>uri_string()),TRUE);
			$this->load->view("guests_interface/seo",$pagevar);
		else:
			show_404();
		endif;
	}
	
	public function about(){
		
		$pagevar = $this->loadManufacturers();
		$this->load->model(array('pages','page_resources'));
		$pagevar['content'] = $this->pages->getWhere(NULL,array('url'=>$this->uri->segment(1)));
		$pagevar['images'] = $this->page_resources->getWhere(NULL,array('page'=>$this->uri->segment(1)),TRUE);
		$this->load->view("guests_interface/about",$pagevar);
	}
	
	public function contacts(){
		
		$pagevar = $this->loadManufacturers();
		
		$this->load->view("guests_interface/contacts",$pagevar);
	}
	
	public function manufacturers(){
		
		$this->load->model(array('manufacturers','manufacturers_images'));
		$pagevar = array(
			'manufacturers' => $this->manufacturers->getAll(),
			'single' => array(),
			'images' => array()
		);
		if($this->uri->segment(1) !== FALSE && array_search($this->uri->segment(1),$this->categoriesURL)):
			$categoryID = array_search($this->uri->segment(1),$this->categoriesURL);
			if($this->uri->segment(2) !== FALSE ):
				$pagevar['single'] = $this->manufacturers->getWhere(NULL,array('category'=>$categoryID,'translit'=>$this->uri->segment(2)));
				if(isset($pagevar['single']['id']) && is_numeric($pagevar['single']['id'])):
					$pagevar['images'] = $this->manufacturers_images->getWhere(NULL,array('manufacturer'=>$pagevar['single']['id']),TRUE);
				endif;
			endif;
		endif;
		if(empty($pagevar['single'])):
			show_404();
		endif;
		for($i=0;$i<count($pagevar['manufacturers']);$i++):
			$pagevar['manufacturers'][$i]['link'] = $this->categoriesURL[$pagevar['manufacturers'][$i]['category']].'/'.$pagevar['manufacturers'][$i]['translit'];
		endfor;
		$this->load->view("guests_interface/manufacturers",$pagevar);
	}
	
	private function loadManufacturers(){
		
		$this->load->model('manufacturers');
		$pagevar = array(
			'manufacturers'=>$this->manufacturers->getAll()
		);
		for($i=0;$i<count($pagevar['manufacturers']);$i++):
			$pagevar['manufacturers'][$i]['link'] = $this->categoriesURL[$pagevar['manufacturers'][$i]['category']].'/'.$pagevar['manufacturers'][$i]['translit'];
		endfor;
		return $pagevar;
	}

	/******************************************* Авторизация и регистрация ***********************************************/
	
	public function signIN(){
		
		$this->load->view("guests_interface/accounts/signin");
	}
	
	public function logoff(){
		
		$this->clearSession(FALSE);
		$this->session->unset_userdata(array('logon'=>'','profile'=>'','account'=>'','backpath'=>''));
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		else:
			redirect('');
		endif;
	}
}