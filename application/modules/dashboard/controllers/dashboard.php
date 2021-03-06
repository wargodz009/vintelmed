<?php

class Dashboard extends MX_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('reports/report_model');
		$this->load->model('items/items_model');
		$this->load->model('item_type/item_type_model');
		$this->load->model('batch/batch_model');
		$this->load->model('user/medrep_model');
	}
	function index($filter = '',$var = '') {
		//$this->output->enable_profiler(true);
		if($this->users->is_admin() === true) {
			$this->load->model('orders/orders_model');
			$data['pre_approval'] = $this->orders_model->get_some('gm_approve_pre','0',true,'pre');
			$data['post_approval'] = $this->orders_model->get_some('gm_approve_post','0',true,'post');
			$data['sales_and_collection'] = modules::run('reports/sac/get_current');
			$data['collection_updates'] = modules::run('reports/collection/get_current');
			if($filter == 'item_type') {
				$data['items'] = $this->report_model->get_inventory_items($var);
			} else {
				$data['items'] = $this->report_model->get_inventory_items();
			}
			$this->template->load('template','dashboard/index',$data);
		} else if($this->users->is_logged_in() === true && $this->users->is_accountant() === true) {
			$this->load->model('orders/orders_model');
			$data['sales_and_collection'] = modules::run('reports/sac/get_current');
			$data['collection_updates'] = modules::run('reports/collection/get_current');
			$data['all_pending'] = $this->orders_model->get_some('status','pending');
			$this->template->load('template','dashboard/accountant',$data);
		} else if($this->users->is_logged_in() === true && $this->users->is_msr() === true) {
			$this->template->load('template','dashboard/medrep');
		} else if($this->users->is_logged_in() === true && $this->users->is_warehouseman() === true) {
			$this->load->model('orders/orders_model');
			if($filter == 'item_type') {
				$data['items'] = $this->report_model->get_inventory_items($var);
			} else {
				$data['items'] = $this->report_model->get_inventory_items();
			}
			$this->template->load('template','dashboard/warehouseman',$data);
		} else if($this->users->is_logged_in() === true && $this->users->is_client() === true) {
			$this->template->load('template','dashboard/client');
		} else if($this->users->is_logged_in() === true && $this->users->is_hrd() === true) {
			$this->template->load('template','dashboard/hrd');
		} else {
			redirect('welcome');
		}
	}
}

?>