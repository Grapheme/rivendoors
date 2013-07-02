<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	$config = array(
		'signin' =>array(
			array('field'=>'login','label'=>'Логин','rules'=>'required|trim'),
			array('field'=>'password','label'=>'Пароль','rules'=>'required|trim')
		),
		'page' =>array(
			array('field'=>'id','label'=>'ID','rules'=>'required|numeric|trim'),
			array('field'=>'content','label'=>'Контент','rules'=>'required|trim'),
		),
		'manufacturer' =>array(
			array('field'=>'title','label'=>'Название','rules'=>'required|trim'),
			array('field'=>'comment','label'=>'Производство','rules'=>'required|trim'),
			array('field'=>'description','label'=>'Описание','rules'=>'required|trim'),
		)
	);
?>