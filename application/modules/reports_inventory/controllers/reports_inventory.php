<?php

class Reports_inventory extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("reports_inventory/reports_inventory_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin() || $this->users->is_warehouseman()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'reports_inventory/display';
            $config['total_rows'] = $this->reports_inventory_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['reports_inventory'] = $this->reports_inventory_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','reports_inventory/reports_inventory_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin() || $this->users->is_warehouseman()) {
    		if(!empty($_POST)){
    			if($this->reports_inventory_model->create($_POST)){
    				$this->session->set_flashdata('error','reports_inventory saved!');	
    			} else {
    				$this->session->set_flashdata('error','reports_inventory not saved!');	
    			}
    			redirect('reports_inventory');
    		} else {
    			$this->template->load('template','reports_inventory/reports_inventory_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->reports_inventory_model->update($id,$_POST);
			$this->session->set_flashdata('error','reports_inventory updated!');	
			redirect('reports_inventory');
		} else {
			$data['reports_inventory'] = $this->reports_inventory_model->get_single($id);
			if(!$data['reports_inventory']) {
				$this->session->set_flashdata('error','not a valid reports_inventory!');	
				redirect('reports_inventory');
			}
			$this->template->load('template','reports_inventory/reports_inventory_edit',$data);
		}
	}
	function view($id) {
		$data['reports_inventory'] = $this->reports_inventory_model->get_single($id);
		if(!$data['reports_inventory']) {
			$this->session->set_flashdata('error','not a valid reports_inventory!');	
			redirect('reports_inventory');
		}
		$this->template->load('template','reports_inventory/reports_inventory_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->reports_inventory_model->delete($id)) {
				$this->session->set_flashdata('error','reports_inventory removed!');	
			} else {
				$this->session->set_flashdata('error','reports_inventory not removed!');	
			}
		}
		redirect('reports_inventory');
	}
}
?>