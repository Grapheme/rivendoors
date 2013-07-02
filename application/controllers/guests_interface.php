<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	
	function __construct(){

		parent::__construct();
		$this->load->library('page_variables');
	}
	
	public function index(){
		
		$pagevar = array(
			'manufacturers'=>array()
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