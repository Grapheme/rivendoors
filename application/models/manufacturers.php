<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers extends MY_Model{

	protected $table = "manufacturers";
	protected $primary_key = "id";
	protected $fields = array("id","page_title","page_description","category","title","translit","comment","description","logo");

	function __construct(){
		parent::__construct();
	}
}