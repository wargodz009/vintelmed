<?php

class Clients extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("user/client_model");
		$this->load->model("clients/clients_model");
		$this->load->model("user/user_model");
	}
	function index($msr_id =0,$offset = 0) {
		$this->display($msr_id,$offset);
	}
	function display($msr_id,$offset = 0) {
		$this->load->library('pagination');
        if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_accountant() || $this->users->is_hrd()) {
            if($this->users->is_admin()) {
				$config['base_url'] = base_url().'clients/display';
				$config['total_rows'] = $this->clients_model->count_all();
				$config['per_page'] = 15;
				$this->pagination->initialize($config); 
				$data['client'] = $this->clients_model->get_all($offset,$config['per_page']);
				$this->template->load('template','clients/clients_list',$data);
			} else if($this->users->is_accountant() || $this->users->is_msr() || $this->users->is_hrd()){
				$config['base_url'] = base_url().'clients/display';
				$config['total_rows'] = $this->client_model->get_clients($msr_id,true);
				$config['per_page'] = 15;
				$this->pagination->initialize($config); 
				$data['client'] = $this->client_model->get_clients($msr_id,false,$offset,$config['per_page']);
				$this->template->load('template','clients/clients_list',$data);
			}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_hrd()) {
    		if(!empty($_POST)){
    			if($this->user_model->get_single($_POST['username'],true,'username') == 'Invalid user') { 
					$id = $this->user_model->create($_POST);
					if($id) {
						$logs = array(
							'user_id'=>$this->session->userdata('user_id'),
							'type'=>'user',
							'action'=>'create',
							'response'=>$id,
							'fingerprint'=>$_SERVER['REMOTE_ADDR'],
						);
						$this->logs->add($logs);
						$this->session->set_flashdata('error','user saved!');	
					} else {
						$this->session->set_flashdata('error','user not saved!');	
					}
				} else {
					$this->session->set_flashdata('error','user not saved! username already taken!');	
				}
    			redirect('clients');
    		} else {
    			$this->template->load('template','clients/clients_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_hrd()) {
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
		if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_hrd()) {
			if(!empty($id)) {
				if($this->client_model->delete($id)) {
					$this->session->set_flashdata('error','client removed!');	
				} else {
					$this->session->set_flashdata('error','client not removed!');	
				}
			}
		}
		redirect('client');
	}
}
?>