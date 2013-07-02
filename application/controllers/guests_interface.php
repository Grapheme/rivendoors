<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	
	function __construct(){

		parent::__construct();
	}
	
	public function index(){
		
		$pagevar = array(
		);
		$this->load->view("guests_interface/index",$pagevar);
	}
	
	public function news(){
		
		$this->offset = intval($this->uri->segment(3));
		$this->load->helper('date');
		$this->load->model('news');
		$pagevar = array(
			'news' => array(),
			'pagination' => array()
		);
		if($this->input->get('news') === FALSE):
			$pagevar['news'] = $this->news->limit($this->per_page,$this->offset);
			$pagevar['pagination'] = $this->pagination('news',3,$this->news->countAllResults(),$this->per_page);
			$this->load->view("guests_interface/news",$pagevar);
		elseif(is_numeric($this->input->get('news'))):
			$pagevar['news'] = $this->news->getWhere($this->input->get('news'));
			$this->load->view("guests_interface/single-news",$pagevar);
		endif;
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