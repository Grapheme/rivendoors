<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	
	function __construct(){

		parent::__construct();
		$this->load->library('page_variables');
	}
	
	public function index(){
		
		$this->load->model('manufacturers');
		$pagevar = array(
			'manufacturers'=>$this->manufacturers->getAll()
		);
		$this->load->view("guests_interface/index",$pagevar);
	}
	
	public function about(){
		
		$this->load->model(array('pages','page_resources'));
		$pagevar = array(
			'content' => $this->pages->getWhere(NULL,array('url'=>$this->uri->segment(1))),
			'images' => $this->page_resources->getWhere(NULL,array('page'=>$this->uri->segment(1)),TRUE)
		);
		$this->load->view("guests_interface/about",$pagevar);
	}
	
	public function contacts(){
		
		$this->load->view("guests_interface/contacts");
	}
	
	public function manufacturers(){
		
		$categories = array('entrance-doors'=>2,'interior-doors'=>3,'dekor'=>4,'parket'=>5);
		$this->load->model(array('manufacturers','manufacturers_images'));
		$pagevar = array(
			'manufacturers' => $this->manufacturers->getWhere(NULL,array('category'=>$categories[$this->uri->segment(1)]),TRUE),
			'single' => array('title'=>'','logo'=>'','comment'=>'','description'=>''),
			'images' => array()
		);
		if($this->input->get('id') !== FALSE && is_numeric($this->input->get('id')) === TRUE):
			$pagevar['single'] = $this->manufacturers->getWhere($this->input->get('id'),array('category'=>$categories[$this->uri->segment(1)]));
			$pagevar['images'] = $this->manufacturers_images->getWhere(NULL,array('manufacturer'=>$this->input->get('id')),TRUE);
		else:
			if(isset($pagevar['manufacturers'][0])):
				redirect($this->uri->segment(1).'/manufacturer/'.$this->translite($pagevar['manufacturers'][0]['title']).'?id='.$pagevar['manufacturers'][0]['id']);
			endif;
		endif;
		for($i=0;$i<count($pagevar['manufacturers']);$i++):
			$pagevar['manufacturers'][$i]['link'] = $this->uri->segment(1).'/manufacturer/'.$this->translite($pagevar['manufacturers'][$i]['title']).'?id='.$pagevar['manufacturers'][$i]['id'];
		endfor;
		$this->load->view("guests_interface/manufacturers",$pagevar);
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