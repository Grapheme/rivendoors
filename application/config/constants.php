<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb');
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b');
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('PATH_PAGE_VARIABLE',					getcwd().'/application/config/page_variables.php');
define('PATH_SMILEYS',							getcwd().'/img/smileys');
define('NO_IMAGE',								getcwd().'/img/icons/no-photo.png');
define('PER_PAGE_DEFAULT',						10);
define('ADMIN_START_PAGE',						'administrator');
define('ALLOWED_TYPES_DOCUMENTS',				'doc|docx|xls|xlsx|txt|pdf|ppt|pptx');
define('ALLOWED_TYPES_IMAGES',					'jpg|gif|jpeg|png');