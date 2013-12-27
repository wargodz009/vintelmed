<?php

class Reports extends CI_Controller{
	function __construct() {
		parent::__construct();
	}
	function index() {
		$this->template->load('template','reports/reports_list');
	}
	function generate() {
		$this->template->load('template','reports/reports_list');
	}
	function list_all() {
		$this->template->load('template','reports/reports_list');
	}
	function view($report_id) {
		$this->template->load('template','reports/reports_list');
	}
}
?>