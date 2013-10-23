<?php

class Crud extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("crud/crud_model");
	}
	function index(){
		$this->display();
	}
	function display(){
		$data['crud'] = $this->crud_model->get_all();
		$this->template->load('template','crud/crud_list',$data);
	}
	function create() {
		if(!empty($_POST)){
			if($this->crud_model->create($_POST)){
				$this->session->set_flashdata('error','crud saved!');	
			} else {
				$this->session->set_flashdata('error','crud not saved!');	
			}
			redirect('crud');
		} else {
			$this->template->load('template','crud/crud_create');
		}
	}
	function edit($id) {
		if(!empty($_POST)){
			$this->crud_model->update($id,$_POST);
			$this->session->set_flashdata('error','crud updated!');	
			redirect('crud');
		} else {
			$data['crud'] = $this->crud_model->get_single($id);
			if(!$data['crud']) {
				$this->session->set_flashdata('error','not a valid crud!');	
				redirect('crud');
			}
			$this->template->load('template','crud/crud_edit',$data);
		}
	}
	function view($id) {
		$data['crud'] = $this->crud_model->get_single($id);
		if(!$data['crud']) {
			$this->session->set_flashdata('error','not a valid crud!');	
			redirect('crud');
		}
		$this->template->load('template','crud/crud_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->crud_model->delete($id)){
				$this->session->set_flashdata('error','crud removed!');	
			} else {
				$this->session->set_flashdata('error','crud not removed!');	
			}
		}
		redirect('crud');
	}
}

?>