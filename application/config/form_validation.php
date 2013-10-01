<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	$config = array(
		'signin' =>array(
			array('field'=>'login','label'=>'Логин','rules'=>'required|trim'),
			array('field'=>'password','label'=>'Пароль','rules'=>'required|trim')
		),
		'page' =>array(
			array('field'=>'content','label'=>'Контент','rules'=>'trim'),
		),
		'manufacturer' =>array(
			array('field'=>'page_title','label'=>'Title страницы','rules'=>'trim'),
			array('field'=>'page_description','label'=>'Description страницы','rules'=>'trim'),
			array('field'=>'page_url','label'=>'URL страницы','rules'=>'trim'),
			array('field'=>'title','label'=>'Название','rules'=>'required|trim'),
			array('field'=>'comment','label'=>'Производство','rules'=>'required|trim'),
			array('field'=>'description','label'=>'Описание','rules'=>'required|trim'),
		),
		'image_caption' =>array(
			array('field'=>'id','label'=>'ID','rules'=>'required|numeric|trim'),
			array('field'=>'caption','label'=>'Подпись','rules'=>'trim'),
			array('field'=>'description','label'=>'Описание','rules'=>'trim')
		)
	);
?>