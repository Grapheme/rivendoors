<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	function blog_limiter($content){
		
		if(!empty($content)):
			$pattern = "/\<cut text\=\"(.+?)\">/i";
			$replacement = "<a href=\"#\" class=\"no-clickable advanced muted\">\$1</a> <cut>";
			return preg_replace($pattern, $replacement,$content);
		else:
			return '';
		endif;
	}
	
	function getAccountStatus($accountID,$status){
		
		$html = '<div class="onoffswitch">';
		$html .= '<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox input-change-account-status" id="OnOffSwitchStatus'.$accountID.'" data-account="'.$accountID.'"';
		$html .= ($status == TRUE)?' checked="checked"':'';
		$html .= ' >';
		$html .= '<label class="onoffswitch-label" for="OnOffSwitchStatus'.$accountID.'"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>';
		return $html .= '</div>';
	}
	
	function getExpertRequest($requestID){
		
		$html = '<button type="button" data-request-status="1" data-request="'.$requestID.'" class="btn button-change-request-expert-status">Одобрить</button>';
		$html .= '<button type="button" data-request-status="2" data-request="'.$requestID.'" class="btn danger button-change-request-expert-status">Отклонить</button>';
		return $html;
	}
	
	function getExpertStatus($accountID,$expert){
		
		$html = '<div class="onoffswitch">';
		$html .= '<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox input-change-expert-status" id="OnOffSwitchExpert'.$accountID.'" data-account="'.$accountID.'"';
		$html .= ($expert == TRUE)?' checked="checked"':'';
		$html .= ' >';
		$html .= '<label class="onoffswitch-label" for="OnOffSwitchExpert'.$accountID.'"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>';
		return $html .= '</div>';
	}
	
	function getCourseStatus($courseID,$status){
		
		$html = '<div class="onoffswitch">';
		$html .= '<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox input-change-course-status" id="OnOffSwitchCourse'.$courseID.'" data-course="'.$courseID.'"';
		$html .= ($status == 1)?' checked="checked"':'';
		$html .= ' >';
		$html .= '<label class="onoffswitch-label" for="OnOffSwitchCourse'.$courseID.'"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label>';
		return $html .= '</div>';
	}
	
	function getCourseModerationRequest($courseID){
		
		$html = '<button type="button" data-course-status="1" data-course="'.$courseID.'" class="btn button-change-project-modaration-status">Опубликовать</button>';
		$html .= '<button type="button" data-course-status="3" data-course="'.$courseID.'" class="btn danger button-change-project-modaration-status">Отклонить</button>';
		return $html;
	}
?>