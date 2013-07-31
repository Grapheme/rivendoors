<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Model{

	protected $table = "pages";
	protected $primary_key = "id";
	protected $fields = array("id","page_title","page_description","url","content");

	function __construct(){
		parent::__construct();
	}
}