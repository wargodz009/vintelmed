<?php

class Inventory extends CI_Controller{
	function __construct() {
		parent::__construct();
	}
	function index() {
		$this->template->load('template','inventory/inventory_list');
	}
}
?>