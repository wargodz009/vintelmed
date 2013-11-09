<?php

class Site extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("site/site_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'site/display';
            $config['total_rows'] = $this->site_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['site'] = $this->site_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','site/site_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->site_model->create($_POST)){
    				$this->session->set_flashdata('error','site saved!');	
    			} else {
    				$this->session->set_flashdata('error','site not saved!');	
    			}
    			redirect('site');
    		} else {
    			$this->template->load('template','site/site_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->site_model->update($id,$_POST);
			$this->session->set_flashdata('error','site updated!');	
			redirect('site');
		} else {
			$data['site'] = $this->site_model->get_single($id);
			if(!$data['site']) {
				$this->session->set_flashdata('error','not a valid site!');	
				redirect('site');
			}
			$this->template->load('template','site/site_edit',$data);
		}
	}
	function view($id) {
		$data['site'] = $this->site_model->get_single($id);
		if(!$data['site']) {
			$this->session->set_flashdata('error','not a valid site!');	
			redirect('site');
		}
		$this->template->load('template','site/site_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->site_model->delete($id)) {
				$this->session->set_flashdata('error','site removed!');	
			} else {
				$this->session->set_flashdata('error','site not removed!');	
			}
		}
		redirect('site');
	}
	function emergency_access(){
		$this->template->load('template','site/site_login');
	}
}
?>