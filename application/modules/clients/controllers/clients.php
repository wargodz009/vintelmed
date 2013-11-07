<?php

class Clients extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("user/client_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin() || $this->users->is_msr()) {
            $this->load->library('pagination');
			$msr_id = $this->session->userdata('user_id');
            $config['base_url'] = base_url().'clients/display';
            $config['total_rows'] = $this->client_model->get_clients($msr_id,true);
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['client'] = $this->client_model->get_clients($msr_id,false,$offset,$config['per_page']);
		    $this->template->load('template','clients/clients_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin() || $this->users->is_msr()) {
    		if(!empty($_POST)){
    			if($this->client_model->create($_POST)){
    				$this->session->set_flashdata('error','client saved!');	
    			} else {
    				$this->session->set_flashdata('error','client not saved!');	
    			}
    			redirect('client');
    		} else {
    			$this->template->load('template','clients/client_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->client_model->update($id,$_POST);
			$this->session->set_flashdata('error','client updated!');	
			redirect('client');
		} else {
			$data['client'] = $this->client_model->get_single($id);
			if(!$data['client']) {
				$this->session->set_flashdata('error','not a valid client!');	
				redirect('client');
			}
			$this->template->load('template','clients/client_edit',$data);
		}
	}
	function view($id) {
		$data['client'] = $this->client_model->get_single($id);
		if(!$data['client']) {
			$this->session->set_flashdata('error','not a valid client!');	
			redirect('client');
		}
		$this->template->load('template','clients/client_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->client_model->delete($id)) {
				$this->session->set_flashdata('error','client removed!');	
			} else {
				$this->session->set_flashdata('error','client not removed!');	
			}
		}
		redirect('client');
	}
}
?>