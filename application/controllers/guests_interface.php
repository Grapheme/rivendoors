<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	var $categories = array('входные двери','межкомнатные двери','декор','паркет');
	
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