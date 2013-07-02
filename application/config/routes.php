<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "guests_interface";
$route['404_override'] = '';

/*************************************************** AJAX INTRERFACE ***********************************************/
/******************guest interface ********************/
$route['login-in'] = "ajax_interface/loginIn";
$route['valid/exist-email'] = "ajax_interface/existEmail";
$route['redactor/upload'] = "ajax_interface/redactorUploadImage";
/**************** remove items ********************/

/******************load view ********************/
$route['page/view-resource/:any'] = "guests_interface/loadResource";
/***************** pages ******************/
$route[ADMIN_START_PAGE.'/page/:any/update'] = "ajax_interface/pageUpdateContent";
$route[ADMIN_START_PAGE.'/page/:any/upload/resource'] = "ajax_interface/pageUploadResources";
$route[ADMIN_START_PAGE.'/page/remove/resource'] = "ajax_interface/removePageResource";
/*************************************************** GUEST INTRERFACE ***********************************************/
$route['clear-session'] = "guests_interface/clearSession";
$route['admin'] = "guests_interface/signIN";
$route['log-off'] = "guests_interface/logoff";
/***************** pages ******************/
$route['about'] = "guests_interface/about";
/********** loading resources *************/
$route['loadimage/:any/:num'] = "guests_interface/loadimage";
/*************************************************** ADMIN INTRERFACE ***********************************************/
$route[ADMIN_START_PAGE] = "admin_interface/control_panel";
$route[ADMIN_START_PAGE.'/page/about'] = "admin_interface/editPage";