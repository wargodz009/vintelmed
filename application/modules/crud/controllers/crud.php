<?php

class Crud extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("crud/crud_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'crud/display';
            $config['total_rows'] = $this->crud_model->count_all();
            $config['per_page'] = 2;
            $this->pagination->initialize($config); 
            
            $data['crud'] = $this->crud_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','crud/crud_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
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
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
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
			if($this->crud_model->delete($id)) {
				$this->session->set_flashdata('error','crud removed!');	
			} else {
				$this->session->set_flashdata('error','crud not removed!');	
			}
		}
		redirect('crud');
	}
}
?>