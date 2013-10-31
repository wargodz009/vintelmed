<?php

class Item_type extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("item_type/item_type_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'item_type/display';
            $config['total_rows'] = $this->item_type_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['item_type'] = $this->item_type_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','item_type/item_type_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->item_type_model->create($_POST)){
    				$this->session->set_flashdata('error','item_type saved!');	
    			} else {
    				$this->session->set_flashdata('error','item_type not saved!');	
    			}
    			redirect('item_type');
    		} else {
    			$this->template->load('template','item_type/item_type_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->item_type_model->update($id,$_POST);
			$this->session->set_flashdata('error','item_type updated!');	
			redirect('item_type');
		} else {
			$data['item_type'] = $this->item_type_model->get_single($id);
			if(!$data['item_type']) {
				$this->session->set_flashdata('error','not a valid item_type!');	
				redirect('item_type');
			}
			$this->template->load('template','item_type/item_type_edit',$data);
		}
	}
	function view($id) {
		$data['item_type'] = $this->item_type_model->get_single($id);
		if(!$data['item_type']) {
			$this->session->set_flashdata('error','not a valid item_type!');	
			redirect('item_type');
		}
		$this->template->load('template','item_type/item_type_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->item_type_model->delete($id)) {
				$this->session->set_flashdata('error','item_type removed!');	
			} else {
				$this->session->set_flashdata('error','item_type not removed!');	
			}
		}
		redirect('item_type');
	}
}
?>