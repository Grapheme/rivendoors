<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	var $account = array('id'=>0);
	var $profile = '';
	var $loginstatus = FALSE;
	var $categories = array(2=>'входные двери',3=>'межкомнатные двери',4=>'декор',5=>'паркет');
	var $categoriesURL = array(2=>'entrance-doors',3=>'interior-doors',4=>'dekor',5=>'parket');
	
	function __construct(){
		
		parent::__construct();
		
		$sessionLogon = $this->session->userdata('logon');
		if($sessionLogon):
			$this->account = json_decode($this->session->userdata('account'),TRUE);
			if($this->account):
				if($this->session->userdata('profile') == FALSE):
					$profile = $this->accounts->getWhere($this->account['id']);
					if($profile && ($sessionLogon == md5($profile['login']))):
						$this->profile = $profile;
						$this->session->set_userdata('profile',json_encode($this->profile));
						$this->loginstatus = TRUE;
					endif;
				else:
					$this->profile = json_decode($this->session->userdata('profile'),TRUE);
					$this->loginstatus = TRUE;
				endif;
			endif;
		endif;
	}
	
	public function clearSession($redirect = TRUE){
		
		if($redirect == TRUE):
			redirect('');
		endif;
		return TRUE;
		
	}
	
	/*************************************************************************************************************/
	
	public function pagination($url,$uri_segment,$total_rows,$per_page){
		
		$this->load->library('pagination');
		$config['base_url'] = site_url($url.'/offset/');
		$config['uri_segment'] = $uri_segment;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 4;
		$config['first_link'] = 'В начало';
		$config['last_link'] = 'В конец';
		$config['next_link'] = 'Далее &raquo;';
		$config['prev_link'] = '&laquo; Назад';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
	
	public function AJAX_Pagination(){
		
		$arguments = &func_get_args();
		$model = (isset($arguments[0]['model']))?$arguments[0]['model']:NULL;
		$where = (isset($arguments[0]['where']))?$arguments[0]['where']:NULL;
		$perPage = (isset($arguments[0]['per_page']))?$arguments[0]['per_page']:PER_PAGE_DEFAULT;
		$currentPage = (isset($arguments[0]['page']))?$arguments[0]['page']:1;
		
		$pagination = '';
		if(!is_null($model)):
			$this->load->model($model);
			$count = $this->$model->countAllResults($where);
			if(!empty($count)):
				$pagination = $this->load->view('html/pagination',array('pages'=>ceil($count/PER_PAGE_DEFAULT),'page'=>$currentPage),TRUE);
			endif;
		endif;
		return $pagination;
	}
	
	public function sendMail($to,$from_mail,$from_name,$subject,$text,$attach = NULL){
		
		$this->load->library('phpmailer');
		$mail = new PHPMailer();
		$mail->IsSendmail();
		$mail->SetFrom($from_mail,$from_name);
		$mail->AddReplyTo($from_mail,$from_name);
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		$mail->MsgHTML($text);
		$mail->AltBody = strip_tags($text,'<p>,<br>');
		//$mail->AddAttachment('images/phpmailer-mini.gif');
		return $mail->Send();
	}
	
	public function loadimage(){
		
		$image = NULL;
		switch($this->uri->segment(2)):
			case 'news': $this->load->model('news'); $image = $this->news->getImage($this->uri->segment(3),'photo'); break;
			case 'events': $this->load->model('events'); $image = $this->events->getImage($this->uri->segment(3),'photo'); break;
			case 'menu': $this->load->model('menu'); $image = $this->menu->getImage($this->uri->segment(3),'photo'); break;
		endswitch;
		if(is_null($image) || empty($image)):
			$image = file_get_contents(NO_IMAGE);
		endif;
		header('Content-type: image/gif');
		echo $image;
	}
	
	public function loadResource(){
		
		$resource = $record = NULL; 
		if($this->input->get('resource_id') != FALSE && is_numeric($this->input->get('resource_id'))):
			switch($this->uri->segment(1)):
				case 'page': 
					$this->load->model('page_resources');
					$record = $this->page_resources->getWhere($this->input->get('resource_id'));
					break;
				case 'manufacturer': 
					$this->load->model('manufacturers_images');
					$record = $this->manufacturers_images->getWhere($this->input->get('resource_id'));
					break;
			endswitch;
			if(!is_null($record) && isset($record)):
				$resource = file_get_contents(getcwd().'/'.$record['resource']);
			endif;
		endif;
		if(is_null($resource)):
			$resource = file_get_contents(NO_IMAGE);
		endif;
		header('Content-type: image/jpeg');
		echo $resource;
	}
	
	public function imageManupulation($filePath,$dim = 'width',$ratio = TRUE,$width = 60,$height = 60){
		
		if(is_file($filePath)):
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $filePath;
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = $ratio;
			$config['master_dim'] = $dim;
			$config['width'] = $width;
			$config['height'] = $height;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			return TRUE;
		else:
			return FALSE;
		endif;
		
	}
	
	public function CropToSquare(){
		
		$arguments = &func_get_args();
		$fileName = (isset($arguments[0]['filepath']))?$arguments[0]['filepath']:NULL;
		$edgeWidth = (isset($arguments[0]['edgeSize']))?$arguments[0]['edgeSize']:800;
		$copy = (isset($arguments[0]['copy']))?TRUE:FALSE;
		
		if(!is_null($fileName) && is_file($fileName)):
			$this->load->library('images');
			$newFile = FALSE;
			if($copy === TRUE):
				$this->load->helper('string');
				$newFile = getcwd().'/download/tmp/'.random_string('alnum',12).'.tmp';
			endif;
			if($this->images->cropToSquare($fileName,$edgeWidth,$edgeWidth,$newFile)):
				if($copy === TRUE):
					return $newFile;
				else:
					return TRUE;
				endif;
			endif;
		endif;
		return FALSE;
	}
	
	public function getImageContent($content = NULL,$manupulation = NULL){
		
		if(!is_null($content)):
			$filepath = TEMPORARY.'file-content.tmp';
			file_put_contents($filepath,$content);
			if(!is_null($manupulation) && is_array($manupulation)):
				$this->imageManupulation($filepath,$manupulation['dim'],$manupulation['ratio'],$manupulation['width'],$manupulation['height']);
			endif;
			$fileContent = file_get_contents($filepath);
			$this->filedelete($filepath);
			return $fileContent;
		else:
			return '';
		endif;
	}
	
	public function uploadServerFiles($documents,$parameters){
		
		$errorMessage = '';
		if(!isset($parameters['upload_path']) || empty($parameters['upload_path'])):
			$parameters['upload_path'] = getcwd().'/diskspace/user'.$this->account['id'].'/';
		else:
			$parameters['upload_path'] = getcwd().'/diskspace/user'.$this->account['id'].'/'.$parameters['upload_path'];
		endif;
		$resources = array();
		for($file=0;$file<count($documents['resources']['name']);$file++):
			if($documents['resources']['error'][$file] != 4):
				$files['userfile']['name'] = $documents['resources']['name'][$file];
				$files['userfile']['type'] = $documents['resources']['type'][$file];
				$files['userfile']['tmp_name'] = $documents['resources']['tmp_name'][$file];
				$files['userfile']['error'] = $documents['resources']['error'][$file];
				$files['userfile']['size'] = $documents['resources']['size'][$file];
				$resultUpload = $this->uploadFile(array('document'=>$files,'upload_path'=>$parameters['upload_path']));
				if($resultUpload['status'] == TRUE):
					$errorMessage .= $resultUpload['message'];
					$resources[$file]['name'] = $resultUpload['uploadData']['file_name'];
					$resources[$file]['size'] = $resultUpload['uploadData']['file_size'];
					$resources[$file]['type'] = substr($resultUpload['uploadData']['file_ext'],1);
				endif;
			endif;
		endfor;
		if(!empty($resources) && (isset($parameters['create_zip']) && $parameters['create_zip'] == TRUE)):
			$resultCreateZip = $this->createZIP(array('zip_path'=>$parameters['upload_path'],'resources'=>$resources));
			if($resultCreateZip['status'] == FALSE):
				$errorMessage .= $resultCreateZip['message'];
				break;
			else:
				if(isset($parameters['model']) && isset($parameters['recordID'])):
					$this->load->model($parameters['model']);
					$this->$parameters['model']->updateField($parameters['recordID'],'resources',json_encode($resources));
					$this->$parameters['model']->updateField($parameters['recordID'],'zip',$resultCreateZip['file_path'].'/'.$resultCreateZip['file_name']);
				endif;
			endif;
		endif;
		return $errorMessage;
	}
	
	public function validationUploadImage(){
		
		$arguments = &func_get_args();
		$fileName = (isset($arguments[0]['file_name']))?$arguments[0]['file_name']:NULL;
		$minWidth = (isset($arguments[0]['min_width']))?$arguments[0]['min_width']:NULL;
		$onlyWide = (isset($arguments[0]['only_wide']))?$arguments[0]['only_wide']:FALSE;
		$maxSize = (isset($arguments[0]['max_size']))?$arguments[0]['max_size']:NULL;
		$return = array('status'=>FALSE,'response'=>'Нет ошибок');
		if(!is_null($fileName) && is_file($fileName)):
			$fileSize = getimagesize($fileName);
			$acceptedTypes = array('image/png','image/jpeg','image/gif');
			if(array_search($fileSize['mime'],$acceptedTypes) != FALSE):
				if(!is_null($minWidth)):
					if($fileSize[0] >= $minWidth):
						$return['status'] = TRUE;
					else:
						$return['status'] = FALSE;
						$return['response'] = 'Ширина меньше '.$minWidth.'px';
					endif;
				endif;
				if($return['status'] == TRUE && $onlyWide == TRUE):
					if($fileSize[0] > $fileSize[1]):
						$return['status'] = TRUE;
					else:
						$return['status'] = FALSE;
						$return['response'] = 'Ширина меньше высоты';
					endif;
				endif;
				if($return['status'] == TRUE && !is_null($maxSize)):
					if(filesize($fileName) < $maxSize):
						$return['status'] = TRUE;
					else:
						$return['status'] = FALSE;
						$return['response'] = 'Размер более '.round($maxSize/1048576).'Мб';
					endif;
				endif;
			endif;
		endif;
		return $return;
	}
	
	public function uploadSingleImage($uploadPath = NULL,$fileName = 'file'){
		
		$uploadStatus = array('status'=>FALSE,'message'=>'','uploadData'=>array());
		if(is_null($uploadPath) || ($this->createDir($uploadPath) == FALSE)):
			$uploadPath = NULL;
		endif;
		if(!is_null($uploadPath)):
			if(!empty($_FILES)):
				$this->load->library('upload');
				$this->load->helper('string');
				$config = array();
				$config['upload_path'] = $uploadPath.'/';
				$config['allowed_types'] = ALLOWED_TYPES_IMAGES;
				$config['remove_spaces'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['max_size'] = 5120;
				$config['file_name'] = random_string('nozero',12).'.'.substr(strrchr($_FILES[$fileName]['name'], '.'),1);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload($fileName)):
					$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Файл: '.$_FILES[$fileName]['name'],'message'=>$this->upload->display_errors()),TRUE);
				else:
					$uploadStatus['uploadData'] = $this->upload->data();
					$uploadStatus['status'] = TRUE;
				endif;
			endif;
		endif;
		return $uploadStatus;
	}
	
	public function dropUploadFile(){
	
		$arguments = &func_get_args();
		$uploadPath = (isset($arguments[0]['upload_path']))?$arguments[0]['upload_path']:NULL;
		if(is_null($uploadPath) || ($this->createDir($uploadPath) == FALSE)):
			$uploadPath = NULL;
		endif;
		$uploadStatus = array('status'=>FALSE,'message'=>'','uploadData'=>array());
		if(!is_null($uploadPath)):
			$this->load->helper('string');
			$fileName = preg_replace('/.+(.)(\.)+/',random_string('nozero',12)."\$2",$this->input->get_request_header('X-file-name',TRUE));
			file_put_contents($uploadPath.$fileName,file_get_contents('php://input'));
			if(is_file($uploadPath.$fileName)):
				$uploadStatus['uploadData']['file_name'] = $fileName;
				$uploadStatus['uploadData']['file_size'] = filesize($uploadPath.$fileName);
				$uploadStatus['status'] = TRUE;
			else:
				$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Загрузка файлов','message'=>'Отсутствует файл для загрузки'),TRUE);
			endif;
		else:
			$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Загрузка файлов','message'=>'Отсутствует каталог загрузки'),TRUE);
		endif;
		return $uploadStatus;
	}
	
	public function uploadFile(){
		
		$arguments = &func_get_args();
		$uploadPath = (isset($arguments[0]['upload_path']))?$arguments[0]['upload_path']:NULL;
		if(is_null($uploadPath) || ($this->createDir($uploadPath) == FALSE)):
			$uploadPath = NULL;
		endif;
		$document = (isset($arguments[0]['document']))?$arguments[0]['document']:NULL;
		$uploadStatus = array('status'=>FALSE,'message'=>'','uploadData'=>array());
		if(!is_null($uploadPath)):
			if(!is_null($document) && is_array($document)):
				$_FILES = $document;
				$this->load->library('upload');
				$this->load->helper('string');
				$config = array();
				$config['upload_path'] = $uploadPath.'/';
				$config['allowed_types'] = (isset($arguments[0]['allowed_types']))?$arguments[0]['allowed_types']:ALLOWED_TYPES_DOCUMENTS.'|'.ALLOWED_TYPES_IMAGES;
				$config['remove_spaces'] = TRUE;
				$config['overwrite'] = (isset($arguments[0]['overwrite']))?$arguments[0]['overwrite']:TRUE;
				$config['max_size'] = (isset($arguments[0]['max_size']))?$arguments[0]['max_size']:5120;
				$config['file_name'] = preg_replace('/.+(.)(\.)+/',random_string('nozero',12)."\$2",$_FILES['userfile']['name']);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload()):
					$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Файл: '.$_FILES['userfile']['name'],'message'=>$this->upload->display_errors()),TRUE);
				else:
					$uploadStatus['uploadData'] = $this->upload->data();
					$uploadStatus['status'] = TRUE;
				endif;
			else:
				$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Загрузка файлов','message'=>'Отсутствует файл для загрузки'),TRUE);
			endif;
		else:
			$uploadStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Загрузка файлов','message'=>'Отсутствует каталог загрузки'),TRUE);
		endif;
		return $uploadStatus;
	}
	
	public function createZIP(){
		
		$zip = new ZipArchive;
		
		$arguments = &func_get_args();
		$filename = (isset($arguments[0]['file_name']))?$arguments[0]['file_name']:'resources.zip';
		$resources = (isset($arguments[0]['resources']))?$arguments[0]['resources']:NULL;
		$zipPath = (isset($arguments[0]['zip_path']))?$arguments[0]['zip_path']:NULL;
		$zipStatus = array('status'=>FALSE,'message'=>'','file_name'=>$filename,'file_path'=>$zipPath);
		if(is_null($zipPath) || $this->createDir($zipPath) == FALSE):
			$zipPath = NULL;
		endif;
		if(!is_null($zipPath)):
			if(!is_null($resources) && is_array($resources)):
				if($zip->open($zipPath.'/'.$filename,ZIPARCHIVE::CREATE)):
					$root = getcwd();
					chdir($zipPath);
					for($file=0;$file<count($resources);$file++):
						if(is_file($resources[$file]['name'])):
							$result = $zip->addFile($resources[$file]['name']);
						endif;
					endfor;
					$zip->close();
					for($file=0;$file<count($resources);$file++):
						$this->filedelete($resources[$file]['name']);
					endfor;
					chdir($root);
					$zipStatus['status'] = TRUE;
				else:
					$zipStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Создание архива','message'=>'Невозможно создать архив'),TRUE);
				endif;
			else:
				$zipStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Создание архива','message'=>'Отсутствуют файлы для создания архива'),TRUE);
			endif;
		else:
			$zipStatus['message'] = $this->load->view('html/print-error',array('alert_header'=>'Создание архива','message'=>'Отсутствует каталог'),TRUE);
		endif;
		return $zipStatus;
	}

	public function filedelete($file = NULL){
		
		if(!is_null($file) && is_file($file)):
			@unlink($file);
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	public function dirDelete($dir = NULL){
		
		if(!is_null($dir) && is_dir($dir)):
			return rmdir($dir);
		endif;
		return FALSE;
	}

	public function translite($string){
		
		$rus = array("1","2","3","4","5","6","7","8","9","0","ё","й","ю","ь","ч","щ","ц","у","к","е","н","г","ш","з","х","ъ","ф","ы","в","а","п","р","о","л","д","ж","э","я","с","м","и","т","б","Ё","Й","Ю","Ч","Ь","Щ","Ц","У","К","Е","Н","Г","Ш","З","Х","Ъ","Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э","Я","С","М","И","Т","Б"," ");
		$eng = array("1","2","3","4","5","6","7","8","9","0","yo","iy","yu","","ch","sh","c","u","k","e","n","g","sh","z","h","","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","","SH","C","U","K","E","N","G","SH","Z","H","","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,$string);
		if(!empty($string)):
			$string = preg_replace('/[^a-z0-9-\.]/','',strtolower($string));
			$string = preg_replace('/[-]+/','-',$string);
			$string = preg_replace('/[\.]+/','.',$string);
			return $string;
		else:
			return FALSE;
		endif;
	}

	public function setActiveUsers($usersList,$field = 'id'){
		
		$list = NULL;
		$session_data = $this->accounts->activeUserData();
		for($i=0;$i<count($session_data);$i++):
			preg_match("/\"userid\"\;s\:[0-9]+\:\"([0-9]+)\"/i",$session_data[$i]['user_data'], $userid);
			if(isset($userid[1])):
				$list[] = (int)$userid[1];
			endif;
		endfor;
		for($i=0;$i<count($usersList);$i++):
			$usersList[$i]['online'] = FALSE;
			for($j=0;$j<count($list);$j++):
				if($usersList[$i][$field] == $list[$j]):
					$usersList[$i]['online'] = TRUE;
				endif;
			endfor;
		endfor;
		if($usersList):
			return $usersList;
		else:
			return NULL;
		endif;
	}
	
	public function postDataValidation($rules){
		
		$this->load->library('form_validation');
		return $this->form_validation->run($rules);
	}
	
	public function createDir($path){
		
		if(!file_exists($path) && !is_dir($path)):
			return mkdir($path,0777,TRUE);
		else:
			return TRUE;
		endif;
	}

	public function insertItem(){
		
		$arguments = &func_get_args();
		$insert = (isset($arguments[0]['insert']))?$arguments[0]['insert']:NULL;
		$model = (isset($arguments[0]['model']))?$arguments[0]['model']:NULL;
		$translit = (isset($arguments[0]['translit']))?$arguments[0]['translit']:NULL;
		unset($arguments);
		if(!is_null($insert) && is_array($insert)):
			if(!is_null($translit)):
				$insert['translit'] = $this->translite($translit);
			endif;
			if(!is_null($model)):
				$this->load->model($model);
				return $this->$model->insertRecord($insert);
			endif;
		endif;
		return FALSE;
	}
	
	public function updateItem(){
		
		$arguments = &func_get_args();
		$update = (isset($arguments[0]['update']))?$arguments[0]['update']:NULL;
		$model = (isset($arguments[0]['model']))?$arguments[0]['model']:NULL;
		$translit = (isset($arguments[0]['translit']))?$arguments[0]['translit']:NULL;
		unset($arguments);
		if(!is_null($update) && is_array($update)):
			if(!is_null($translit)):
				$update['translit'] = $this->translite($translit);
			endif;
			if(!is_null($model)):
				$this->load->model($model);
				return $this->$model->updateRecord($update);
			endif;
		endif;
		return FALSE;
	}
	
	public function getCurlLink($url){
		
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_HEADER,0);
		$result = curl_exec($ch);
		curl_close($ch);
		if($result == FALSE):
			return file_get_contents($url);
		else:
			return $result;
		endif;
	}

	public function getValuesInArray($array,$value = 'id'){
		
		$ids = array();
		for($i=0;$i<count($array);$i++):
			$ids[] = $array[$i][$value];
		endfor;
		return $ids;
	}
	
	public function TranspondIDtoIndex($array,$field = 'id'){
		
		$TmpIDs = array();
		for($i=0;$i<count($array);$i++):
			$TmpIDs[$array[$i][$field]] = $array[$i];
		endfor;
		$ids = array();
		foreach($TmpIDs as $key => $values):
			unset($values[$field]);
			$ids[$key] = $values;
		endforeach;
		return $ids;
	}
	
	public function reIndexArray($array){
		
		$newArray = array();
		foreach($array as $key => $value):
			$newArray[] = $value;
		endforeach;
		return $newArray;
	}
	
	/* -------------------------------------------------------------------------------------------- */
	public function getParentsCategoriesMenu(){
		
		$this->load->model('categories');
		if($categories = $this->categories->getAll()):
			$parents = array();
			for($i=0;$i<count($categories);$i++):
				if($categories[$i]['parent'] == 0):
					$parents[] = $categories[$i];
				endif;
			endfor;
			return $parents;
		endif;
		return FALSE;
	}
	
	public function getHierarchyCategoriesMenu($parents){
		
		$this->load->model('categories');
		if($categories = $this->categories->getAll()):
			$hierarchy = array();
			for($i=0;$i<count($parents);$i++):
				$hierarchy[$i] = $parents[$i];
				for($j=0;$j<count($categories);$j++):
					if($parents[$i]['id'] == $categories[$j]['parent']):
						$hierarchy[$i]['children'][] = $categories[$j];
					endif;
				endfor;
			endfor;
			return $hierarchy;
		endif;
		return FALSE;
	}
	
}
?>