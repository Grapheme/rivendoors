<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "guests_interface";
$route['404_override'] = '';

/*************************************************** AJAX INTRERFACE ***********************************************/
/******************guest interface ********************/
$route['login-in'] = "ajax_interface/loginIn";
$route['valid/exist-email'] = "ajax_interface/existEmail";
$route['redactor/upload'] = "ajax_interface/redactorUploadImage";
/**************** remove items ********************/
$route[ADMIN_START_PAGE.'/manufacturers/insert'] = "ajax_interface/insertManufacturer";
$route[ADMIN_START_PAGE.'/manufacturers/update'] = "ajax_interface/updateManufacturer";
$route[ADMIN_START_PAGE.'/manufacturers/upload/resource'] = "ajax_interface/manufacturerUploadImage";
$route[ADMIN_START_PAGE.'/manufacturers/remove/resource'] = "ajax_interface/manufacturerRemoveImage";
$route[ADMIN_START_PAGE.'/manufacturers/remove'] = "ajax_interface/manufacturerRemove";
$route[ADMIN_START_PAGE.'/manufacturers/caption/resource'] = "ajax_interface/manufacturerImageCaption";
/******************load view ********************/
$route[':any/view-resource/:any'] = "guests_interface/loadResource";
/***************** pages ******************/
$route[ADMIN_START_PAGE.'/page/update'] = "ajax_interface/pageUpdateContent";
$route[ADMIN_START_PAGE.'/page/insert'] = "ajax_interface/pageInsertContent";
$route[ADMIN_START_PAGE.'/pages/:any/upload/resource'] = "ajax_interface/pageUploadResources";
$route[ADMIN_START_PAGE.'/page/remove/resource'] = "ajax_interface/removePageResource";
/*************************************************** GUEST INTRERFACE ***********************************************/
$route['clear-session'] = "guests_interface/clearSession";
$route['admin'] = "guests_interface/signIN";
$route['log-off'] = "guests_interface/logoff";
/***************** pages ******************/
$route['about'] = "guests_interface/about";
$route['contacts'] = "guests_interface/contacts";
$route['entrance-doors/:any'] = "guests_interface/manufacturers";
$route['interior-doors/:any'] = "guests_interface/manufacturers";
$route['dekor/:any'] = "guests_interface/manufacturers";
$route['parket/:any'] = "guests_interface/manufacturers";
/********** loading resources *************/
$route['loadimage/:any/:num'] = "guests_interface/loadimage";
/*************************************************** ADMIN INTRERFACE ***********************************************/
$route[ADMIN_START_PAGE] = "admin_interface/control_panel";

$route[ADMIN_START_PAGE.'/pages'] = "admin_interface/pages";
$route[ADMIN_START_PAGE.'/pages/edit'] = "admin_interface/editPage";
$route[ADMIN_START_PAGE.'/pages/add'] = "admin_interface/addPage";

$route[ADMIN_START_PAGE.'/manufacturers'] = "admin_interface/manufacturers";
$route[ADMIN_START_PAGE.'/manufacturers/add'] = "admin_interface/addManufacturer";
$route[ADMIN_START_PAGE.'/manufacturers/edit'] = "admin_interface/editManufacturer";

/*************************************************** DIMAMIC PAGES ***********************************************/

$route[':any'] = "guests_interface/seo";