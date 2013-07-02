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
		if($newsID = $this->ExecuteUpdatingPageContent($_POST['id'],$_POST)):
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
		$resultUpload = $this->uploadSingleImage($uploadPath);
		if($resultUpload['status'] == TRUE):
			$json_request['responsePhotoSrc'] = $this->savePageResource($resultUpload['uploadData']);
		else:
			$json_request['responseText'] = 'Ошибка при загрузке';
		endif;
		$json_request['status'] = $resultUpload['status'];
		$json_request['status'] = TRUE;
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
			$html = '<img class="" width="200" src="'.site_url('page/view-resource/'.random_string('alnum',16).'?resource_id='.$resourceID).'" alt="" />';
			$html .= '<a href="#" data-resource-id="'.$resourceID.'" class="delete-resource-item">&times;</a>';
			return $html;
		else:
			return '';
		endif;
	}
	
	private function ExecuteUpdatingPageContent($id,$post){
		
		/**************************************************************************************************************/
		$content = array("id"=>$id,"content"=>$post['content']);
		/**************************************************************************************************************/
		$this->updateItem(array('update'=>$content,'model'=>'pages'));
		return TRUE;
	}
	
	/* -------------------------------------------------------------- */

	
	/* -------------------------------------------------------------- */
}