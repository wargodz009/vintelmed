<?php

class Batch extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("batch/batch_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'batch/display';
            $config['total_rows'] = $this->batch_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['batch'] = $this->batch_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','batch/batch_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->batch_model->create($_POST)){
    				$this->session->set_flashdata('error','batch saved!');	
    			} else {
    				$this->session->set_flashdata('error','batch not saved!');	
    			}
    			redirect('batch');
    		} else {
    			$this->template->load('template','batch/batch_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->batch_model->update($id,$_POST);
			$this->session->set_flashdata('error','batch updated!');	
			redirect('batch');
		} else {
			$data['batch'] = $this->batch_model->get_single($id);
			if(!$data['batch']) {
				$this->session->set_flashdata('error','not a valid batch!');	
				redirect('batch');
			}
			$this->template->load('template','batch/batch_edit',$data);
		}
	}
	function view($id) {
		$data['batch'] = $this->batch_model->get_single($id);
		if(!$data['batch']) {
			$this->session->set_flashdata('error','not a valid batch!');	
			redirect('batch');
		}
		$this->template->load('template','batch/batch_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->batch_model->delete($id)) {
				$this->session->set_flashdata('error','batch removed!');	
			} else {
				$this->session->set_flashdata('error','batch not removed!');	
			}
		}
		redirect('batch');
	}
}
?>