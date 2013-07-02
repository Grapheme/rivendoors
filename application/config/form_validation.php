<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	$config = array(
		'signin' =>array(
			array('field'=>'login','label'=>'Логин','rules'=>'required|trim'),
			array('field'=>'password','label'=>'Пароль','rules'=>'required|trim')
		),
		'page' =>array(
			array('field'=>'id','label'=>'ID','rules'=>'required|numeric|trim'),
			array('field'=>'content','label'=>'Контент','rules'=>'required|trim'),
		)
	);
?>