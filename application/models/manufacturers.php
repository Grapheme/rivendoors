<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers extends MY_Model{

	protected $table = "manufacturers";
	protected $primary_key = "id";
	protected $fields = array("id","category","title","comment","description");

	function __construct(){
		parent::__construct();
	}
}