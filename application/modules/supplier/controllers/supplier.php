<?php

class Supplier extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("supplier/supplier_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'supplier/display';
            $config['total_rows'] = $this->supplier_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['supplier'] = $this->supplier_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','supplier/supplier_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->supplier_model->create($_POST)){
    				$this->session->set_flashdata('error','supplier saved!');	
    			} else {
    				$this->session->set_flashdata('error','supplier not saved!');	
    			}
    			redirect('supplier');
    		} else {
    			$this->template->load('template','supplier/supplier_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->supplier_model->update($id,$_POST);
			$this->session->set_flashdata('error','supplier updated!');	
			redirect('supplier');
		} else {
			$data['supplier'] = $this->supplier_model->get_single($id);
			if(!$data['supplier']) {
				$this->session->set_flashdata('error','not a valid supplier!');	
				redirect('supplier');
			}
			$this->template->load('template','supplier/supplier_edit',$data);
		}
	}
	function view($id) {
		$data['supplier'] = $this->supplier_model->get_single($id);
		if(!$data['supplier']) {
			$this->session->set_flashdata('error','not a valid supplier!');	
			redirect('supplier');
		}
		$this->template->load('template','supplier/supplier_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->supplier_model->delete($id)) {
				$this->session->set_flashdata('error','supplier removed!');	
			} else {
				$this->session->set_flashdata('error','supplier not removed!');	
			}
		}
		redirect('supplier');
	}
}
?>