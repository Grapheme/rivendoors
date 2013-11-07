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
	
	public function pages(){
		
		$this->load->model('pages');
		$pagevar = array(
			'pages' => $this->pages->getAll(),
		);
		$this->load->view("admin_interface/pages/list",$pagevar);
	}
	
	public function addPage(){
		
		$this->load->helper('form');
		$this->load->view("admin_interface/pages/add");
	}
	
	public function editPage(){
		
		if($this->input->get('id') === FALSE || is_numeric($this->input->get('id')) === FALSE):
			redirect(ADMIN_START_PAGE);
		endif;
		$this->load->model(array('pages','page_resources'));
		$this->load->helper('form');
		$pagevar = array(
			'content' => $this->pages->getWhere($this->input->get('id')),
			'images' => array(),
			'pageTitle' => ''
		);
		if($pagevar['content']):
			$pagevar['pageTitle'] = $pagevar['content']['title'];
		endif;
		if($this->input->get('mode') == 'text'):
			$this->load->view("admin_interface/pages/edit",$pagevar);
		elseif($this->input->get('mode') == 'image'):
			$pagevar['images'] = $this->page_resources->getWhere(NULL,array('page'=>$pagevar['content']['url']),TRUE);
			$this->load->view("admin_interface/pages/images",$pagevar);
		else:
			redirect(ADMIN_START_PAGE);
		endif;
		
	}
	/***********************************************************************************************************/
	public function manufacturers(){
		
		$this->load->model('manufacturers');
		$category = $this->input->get('category');
		if($category === FALSE || is_numeric($category) === FALSE || $category > 5 || $category < 2):
			redirect(ADMIN_START_PAGE.'/manufacturers?category=2');
		endif;
		$pagevar = array(
			'manufacturers' => $this->manufacturers->getWhere(NULL,array('category'=>$category),TRUE),
		);
		$this->load->view("admin_interface/manufacturers/list",$pagevar);
	}
	
	public function addManufacturer(){
		
		$this->load->model('manufacturers');
		$this->load->helper('form');
		$category = $this->input->get('category');
		if($category === FALSE || is_numeric($category) === FALSE || $category > 5 || $category < 2):
			redirect(ADMIN_START_PAGE.'/manufacturers?category=2');
		endif;
		$pagevar = array('images'=>array());
		if($this->input->get('id') !== FALSE && !$this->manufacturers->search('id',$this->input->get('id'))):
			redirect(ADMIN_START_PAGE.'/manufacturers?category=2');
		else:
			$this->load->model('manufacturers_images');
			$pagevar['images'] = $this->manufacturers_images->getWhere(NULL,array('manufacturer'=>$this->input->get('id')),TRUE);
		endif;
		$this->load->view("admin_interface/manufacturers/add",$pagevar);
	}
	
	public function editManufacturer(){
		
		$this->load->helper('form');
		$this->load->model('manufacturers_images');
		$pagevar = array('manufacturer'=>array(),'images'=>array());
		if($this->input->get('mode') == 'text'):
			$this->load->model('manufacturers');
			$pagevar['manufacturer'] = $this->manufacturers->getWhere($this->input->get('id'));
		elseif($this->input->get('mode') == 'image' || $this->input->get('mode') == 'caption'):
			$this->load->model('manufacturers_images');
			$pagevar['images'] = $this->manufacturers_images->getWhere(NULL,array('manufacturer'=>$this->input->get('id')),TRUE);
		else:
			redirect(ADMIN_START_PAGE);
		endif;
		$this->load->view("admin_interface/manufacturers/edit",$pagevar);
	}

}