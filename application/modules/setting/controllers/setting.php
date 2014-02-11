<?php

class Setting extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("setting/setting_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin() || $this->users->is_hrd()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'setting/display';
            $config['total_rows'] = $this->setting_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['setting'] = $this->setting_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','setting/setting_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
				$id = $this->setting_model->create($_POST);
    			if($id){
    				$this->session->set_flashdata('error','setting saved!');	
    			} else {
    				$this->session->set_flashdata('error','setting not saved!');	
    			}
    			redirect('setting');
    		} else {
    			$this->template->load('template','setting/setting_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if($this->users->is_admin() || $this->users->is_hrd()) {
			if(!empty($_POST)) {
				$this->setting_model->update($id,$_POST);
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'setting',
					'action'=>'update',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','setting updated!');	
				redirect('setting');
			} else {
				$data['setting'] = $this->setting_model->get_single($id);
				if(!$data['setting']) {
					$this->session->set_flashdata('error','not a valid setting!');	
					redirect('setting');
				}
				$this->template->load('template','setting/setting_edit',$data);
			}
		} else {
			$this->session->set_flashdata('error','NO_ACCESS');	
			redirect('setting');
		}
	}
	function view($id) {
		$data['setting'] = $this->setting_model->get_single($id);
		if(!$data['setting']) {
			$this->session->set_flashdata('error','not a valid setting!');	
			redirect('setting');
		}
		$this->template->load('template','setting/setting_view',$data);
	}
}
?>