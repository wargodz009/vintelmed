<?php

class Search extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("search/search_model");
	}
	function index() {
		if($this->users->is_logged_in()){
			if($this->input->post('search') != '') {
				$key = $this->input->post('search');
				$data['all_users'] = $this->search_model->get_user_by_key($key);
				$data['all_items'] = $this->search_model->get_item_by_key($key);
				$data['term'] = $key;
				$this->template->load('template','search/search_list',$data);
			} else {
				$this->session->set_flashdata('error','Invalid Search Key!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error','Please login first!');
			redirect();
		}
	}
}
?>