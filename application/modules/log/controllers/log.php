<?php

class Log extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("log/log_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'log/display';
            $config['total_rows'] = $this->log_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['log'] = $this->log_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','log/log_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->log_model->create($_POST)){
    				$this->session->set_flashdata('error','log saved!');	
    			} else {
    				$this->session->set_flashdata('error','log not saved!');	
    			}
    			redirect('log');
    		} else {
    			$this->template->load('template','log/log_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->log_model->update($id,$_POST);
			$this->session->set_flashdata('error','log updated!');	
			redirect('log');
		} else {
			$data['log'] = $this->log_model->get_single($id);
			if(!$data['log']) {
				$this->session->set_flashdata('error','not a valid log!');	
				redirect('log');
			}
			$this->template->load('template','log/log_edit',$data);
		}
	}
	function view($id) {
		$data['log'] = $this->log_model->get_single($id);
		if(!$data['log']) {
			$this->session->set_flashdata('error','not a valid log!');	
			redirect('log');
		}
		$this->template->load('template','log/log_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->log_model->delete($id)) {
				$this->session->set_flashdata('error','log removed!');	
			} else {
				$this->session->set_flashdata('error','log not removed!');	
			}
		}
		redirect('log');
	}
}
?>