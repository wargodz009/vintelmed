<?php

class District extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("district/district_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'district/display';
            $config['total_rows'] = $this->district_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['district'] = $this->district_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','district/district_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->district_model->create($_POST)){
    				$this->session->set_flashdata('error','district saved!');	
    			} else {
    				$this->session->set_flashdata('error','district not saved!');	
    			}
    			redirect('district');
    		} else {
    			$this->template->load('template','district/district_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->district_model->update($id,$_POST);
			$this->session->set_flashdata('error','district updated!');	
			redirect('district');
		} else {
			$data['district'] = $this->district_model->get_single($id);
			if(!$data['district']) {
				$this->session->set_flashdata('error','not a valid district!');	
				redirect('district');
			}
			$this->template->load('template','district/district_edit',$data);
		}
	}
	function view($id) {
		$data['district'] = $this->district_model->get_single($id);
		if(!$data['district']) {
			$this->session->set_flashdata('error','not a valid district!');	
			redirect('district');
		}
		$this->template->load('template','district/district_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->district_model->delete($id)) {
				$this->session->set_flashdata('error','district removed!');	
			} else {
				$this->session->set_flashdata('error','district not removed!');	
			}
		}
		redirect('district');
	}
}
?>