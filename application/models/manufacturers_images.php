<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers_images extends MY_Model{

	protected $table = "manufacturers_images";
	protected $primary_key = "id";
	protected $fields = array("id","manufacturer","resource");

	function __construct(){
		parent::__construct();
	}
}