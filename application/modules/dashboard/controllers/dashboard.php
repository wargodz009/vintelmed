<?php

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	function index(){
		if($this->users->is_admin() === true) {
			$this->load->model('orders/orders_model');
			$data['pre_approval'] = $this->orders_model->get_some('gm_approve_pre','0',true,'pre');
			$data['post_approval'] = $this->orders_model->get_some('gm_approve_post','0',true,'post');
			$this->template->load('template','dashboard/index',$data);
		} else if($this->users->is_logged_in() === true && $this->users->is_accountant() === true) {
			$this->load->model('orders/orders_model');
			$data['all_pending'] = $this->orders_model->get_some('status','pending');
			$this->template->load('template','dashboard/accountant',$data);
		} else if($this->users->is_logged_in() === true && $this->users->is_msr() === true) {
			$this->template->load('template','dashboard/medrep');
		} else if($this->users->is_logged_in() === true && $this->users->is_warehouseman() === true) {
			$this->template->load('template','dashboard/warehouseman');
		} else if($this->users->is_logged_in() === true && $this->users->is_client() === true) {
			$this->template->load('template','dashboard/client');
		} else {
			redirect('welcome');
		}
	}
}

?>