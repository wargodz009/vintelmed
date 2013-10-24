<?php

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	function index(){
        if($this->users->is_logged_in() === false) {
			redirect('welcome');
		} else {
			$this->template->load('template','dashboard/index');
		}
	}
}

?>