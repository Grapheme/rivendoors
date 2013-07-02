<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends MY_Controller{
	
	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	
	function __construct(){
		
		parent::__construct();
		if(!$this->loginstatus):
			redirect('');
		endif;
	}
	
	/******************************************** cabinet *******************************************************/
	
	public function control_panel(){
		
		$pagevar = array(
		
		);
		$this->load->view("admin_interface/cabinet/control-panel",$pagevar);
	}
	
	/********************************************* pages *********************************************************/
	public function editPage(){
		
		$this->load->model(array('pages','page_resources'));
		$this->load->helper('form');
		$pagevar = array(
			'content' => $this->pages->getWhere(NULL,array('url'=>$this->uri->segment(3))),
			'images' => array(),
			'pageTitle' => 'О компании'
		);
		if($this->input->get('mode') == 'text'):
			$this->load->view("admin_interface/pages/edit",$pagevar);
		elseif($this->input->get('mode') == 'image'):
			$pagevar['images'] = $this->page_resources->getWhere(NULL,array('page'=>$this->uri->segment(3)),TRUE);
			$this->load->view("admin_interface/pages/images",$pagevar);
		else:
			redirect(ADMIN_START_PAGE);
		endif;
		
	}
	
	/***********************************************************************************************************/
}