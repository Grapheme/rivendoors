<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Page_resources extends MY_Model{

	protected $table = "page_resources";
	protected $primary_key = "id";
	protected $fields = array("id","page","resource");

	function __construct(){
		parent::__construct();
	}
}