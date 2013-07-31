<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_interface extends MY_Controller{
	
	function __construct(){
		
		parent::__construct();
	}
	
	public function existEmail(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$statusval = array('status'=>FALSE);
		if($parametr = trim($this->input->post('parametr'))):
			if(!$this->accounts->search('email',$parametr)):
				$statusval['status'] = TRUE;
			endif;
		else:
			$statusval['status'] = TRUE;
		endif;
		echo json_encode($statusval);
	}
	
	private function splitPostData($data){
		
		$result = array();
		$data = preg_split("/&/",$data);
		for($i=0;$i<count($data);$i++):
			$temp = preg_split("/=/",$data[$i]);
			$result[$temp[0]] = $temp[1];
		endfor;
		if(!empty($result)):
			return $result;
		else:
			return FALSE;
		endif;
	}
	
	public function redactorUploadImage(){
		
		$uploadPath = getcwd().'/download/';
		$fileName = $this->uploadSingleImage($uploadPath);
		$file = array(
			'filelink'=>base_url('download/'.$fileName)
		);
		echo stripslashes(json_encode($file));
	}
	/******************************************** guests interface *******************************************************/
	
	public function loginIn(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url());
		if($this->postDataValidation('signin') == TRUE):
			if($user = $this->accounts->authentication($this->input->post('login'),$this->input->post('password'))):
				if($user['active']):
					$account = json_encode(array('id'=>$user['id']));
					$this->session->set_userdata(array('logon'=>md5($this->input->post('login')),'account'=>$account));
					$json_request['redirect'] = site_url(ADMIN_START_PAGE);
					$json_request['status'] = TRUE;
				else:
					$json_request['responseText'] = 'Аккаунт не активирован';
				endif;
			else:
				$json_request['responseText'] = 'Неверный логин или пароль';
			endif;
		else:
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены поля'),TRUE);
		endif;
		echo json_encode($json_request);
	}

	/********************************************* admin interface *******************************************************/
	
	public function pageInsertContent(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->postDataValidation('page') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($newsID = $this->ExecuteInsertingPageContent($_POST)):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Cохранено';
		endif;
		echo json_encode($json_request);
	}
	
	public function pageUpdateContent(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->postDataValidation('page') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($newsID = $this->ExecuteUpdatingPageContent($this->input->get('id'),$_POST)):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Cохранено';
		endif;
		echo json_encode($json_request);
	}
	
	public function pageUploadResources(){
		
		if(!$this->input->is_ajax_request() && !$this->input->get_request_header('X-file-name',TRUE)):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'');
		$uploadPath = getcwd().'/download/';
		if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,1980,1345)):
			$resultUpload = $this->uploadSingleImage($uploadPath);
			if($resultUpload['status'] == TRUE):
				$json_request['responsePhotoSrc'] = $this->savePageResource($resultUpload['uploadData']);
			else:
				$json_request['responseText'] = 'Ошибка при загрузке';
			endif;
			$json_request['status'] = $resultUpload['status'];
		endif;
		echo json_encode($json_request);
	}
	
	public function removePageResource(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->input->post('resourceID') != FALSE):
			$this->load->model('page_resources');
			$resourcePath = getcwd().'/'.$this->page_resources->value($this->input->post('resourceID'),'resource');
			$this->page_resources->delete($this->input->post('resourceID'));
			$this->filedelete($resourcePath);
			$json_request['status'] = TRUE;
		endif;
		echo json_encode($json_request);
	}
	
	private function savePageResource($resource){
		
		$resourceData = array("page"=>$this->uri->segment(3),"resource"=>'download/'.$resource['file_name']);
		/**************************************************************************************************************/
		if($resourceID = $this->insertItem(array('insert'=>$resourceData,'model'=>'page_resources'))):
			$this->load->helper('string');
			$html = '<img class="img-rounded" src="'.site_url('page/view-resource/'.random_string('alnum',16).'?resource_id='.$resourceID).'" alt="" />';
			$html .= '<a href="#" data-resource-id="'.$resourceID.'" class="delete-resource-item">&times;</a>';
			return $html;
		else:
			return '';
		endif;
	}
	
	private function ExecuteInsertingPageContent($post){
		
		/**************************************************************************************************************/
		$content = array("page_title"=>$post['page_title'],"page_description"=>$post['page_description'],"url"=>$post['url'],"content"=>$post['content']);
		/**************************************************************************************************************/
		$this->insertItem(array('insert'=>$content,'model'=>'pages'));
		return TRUE;
	}
	
	private function ExecuteUpdatingPageContent($id,$post){
		
		/**************************************************************************************************************/
		$content = array("id"=>$id,"page_title"=>$post['page_title'],"page_description"=>$post['page_description'],"url"=>$post['url'],"content"=>$post['content']);
		/**************************************************************************************************************/
		$this->updateItem(array('update'=>$content,'model'=>'pages'));
		return TRUE;
	}
	
	/* -------------------------------------------------------------- */
	
	public function insertManufacturer(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('manufacturer') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($manufacturerID = $this->ExecuteCreatingManufacturer($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				$this->uploadManufacturerLogo($manufacturerID);
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Производитель добавлен';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/manufacturers/add?category='.$this->input->get('category').'&id='.$manufacturerID.'&step=2');
		endif;
		echo json_encode($json_request);
	}
	
	public function updateManufacturer(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('manufacturer') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($manufacturerID = $this->ExecuteUpdatingManufacturer($this->input->get('id'),$_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				$json_request['responsePhotoSrc'] = $this->uploadManufacturerLogo($this->input->get('id'));
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Производитель cохранен';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/manufacturers/edit?mode=image&category='.$this->input->get('category').'&id='.$this->input->get('id'));
		endif;
		echo json_encode($json_request);
	}
	
	public function manufacturerUploadImage(){
		
		if(!$this->input->is_ajax_request() && !$this->input->get_request_header('X-file-name',TRUE)):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'');
		$uploadPath = getcwd().'/download/';
		if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,1980,1345)):
			$resultUpload = $this->uploadSingleImage($uploadPath);
			if($resultUpload['status'] == TRUE):
				$json_request['responsePhotoSrc'] = $this->saveManufacturerImage($resultUpload['uploadData']);
			else:
				$json_request['responseText'] = 'Ошибка при загрузке';
			endif;
			$json_request['status'] = $resultUpload['status'];
		endif;
		echo json_encode($json_request);
	}
	
	public function manufacturerRemove(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteManufacture($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Производитель cохранен';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/manufacturers/add?mode=image&category='.$this->input->get('category').'&id='.$this->input->get('id'));
		endif;
		echo json_encode($json_request);
	}
	
	public function manufacturerRemoveImage(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->input->post('resourceID') != FALSE):
			$this->load->model('manufacturers_images');
			$resourcePath = getcwd().'/'.$this->manufacturers_images->value($this->input->post('resourceID'),'resource');
			$this->manufacturers_images->delete($this->input->post('resourceID'));
			$this->filedelete($resourcePath);
			$json_request['status'] = TRUE;
		endif;
		echo json_encode($json_request);
	}
	
	public function manufacturerImageCaption(){
		
		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE);
		if($this->postDataValidation('image_caption') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		$this->load->model('manufacturers_images');
		$this->manufacturers_images->updateField($_POST['id'],'caption',$_POST['caption']);
		$json_request['status'] = TRUE;
		echo json_encode($json_request);
	}
	
	private function ExecuteCreatingManufacturer($post){
		
		/**************************************************************************************************************/
		$manufacturer = array("page_title"=>$post['page_title'],"page_description"=>$post['page_description'],"category"=>$this->input->get('category'),"title"=>$post['title'],"comment"=>$post['comment'],
			"description"=>$post['description']);
		/**************************************************************************************************************/
		if($manufacturerID = $this->insertItem(array('insert'=>$manufacturer,'translit'=>$this->translite($post['title']),'model'=>'manufacturers'))):
			return $manufacturerID;
		endif;
		return FALSE;
	}
	
	private function ExecuteUpdatingManufacturer($id,$post){
		
		/**************************************************************************************************************/
		$manufacturer = array("id"=>$id,"page_title"=>$post['page_title'],"page_description"=>$post['page_description'],"title"=>$post['title'],
			"title"=>$post['title'],"comment"=>$post['comment'],"description"=>$post['description']);
		/**************************************************************************************************************/
		$this->updateItem(array('update'=>$manufacturer,'translit'=>$this->translite($post['title']),'model'=>'manufacturers'));
		return TRUE;
	}
	
	private function saveManufacturerImage($resource){
		
		$resourceData = array("manufacturer"=>$this->input->get('id'),"resource"=>'download/'.$resource['file_name']);
		/**************************************************************************************************************/
		if($resourceID = $this->insertItem(array('insert'=>$resourceData,'model'=>'manufacturers_images'))):
			$this->load->helper('string');
			$html = '<img class="img-rounded" src="'.site_url('manufacturer/view-resource/'.random_string('alnum',16).'?resource_id='.$resourceID).'" alt="" />';
			$html .= '<a href="#" data-resource-id="'.$resourceID.'" class="delete-resource-item">&times;</a>';
			return $html;
		else:
			return '';
		endif;
	}
	
	private function deleteManufacture($id){
		
		$this->load->model(array('manufacturers_images','manufacturers'));
		$images = $this->manufacturers_images->getWhere(NULL,array('manufacturer'=>$id),TRUE);
		for($i=0;$i<count($images);$i++):
			$this->filedelete(getcwd().'/'.$images[$i]['resource']);
		endfor;
		$this->manufacturers_images->delete(NULL,array('manufacturer'=>$id));
		return $this->manufacturers->delete($id);
	}
	
	private function uploadManufacturerLogo($id){
		
		$responsePhotoSrc = '';
		$resultUpload = $this->uploadSingleImage(getcwd().'/download/');
		if($resultUpload['status'] == TRUE):
			$this->load->model('manufacturers');
			$responsePhotoSrc = $this->manufacturers->updateField($id,'logo','download/'.$resultUpload['uploadData']['file_name']);
		endif;
		return $responsePhotoSrc;
	}
	
	/* -------------------------------------------------------------- */
}	