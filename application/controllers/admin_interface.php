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
	
	public function addNews(){
		
		$this->load->helper('form');
		$this->load->view("admin_interface/news/add");
	}
	
	public function editNews(){
		
		$this->load->helper(array('date','form'));
		$this->load->model('news');
		$pagevar = array(
			'news' => $this->news->getWhere($this->uri->segment(4)),
		);
		if(empty($pagevar['news'])):
			show_error('В доступе отказано');
		endif;
		$pagevar['news']['date_publish'] = swap_dot_date_without_time($pagevar['news']['date_publish']);
		$this->load->view("admin_interface/news/edit",$pagevar);
	}
	
	public function deleteNews(){
		
		$this->load->model('news');
		$this->news->delete($this->uri->segment(4));
		redirect(ADMIN_START_PAGE.'/news');
	}
	
	/***********************************************************************************************************/
}