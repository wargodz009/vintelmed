<?php

class Items extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("items/items_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'items/display';
            $config['total_rows'] = $this->items_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['items'] = $this->items_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','items/items_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
				$id = $this->items_model->create($_POST);
    			if($id){
					$logs = array(
						'user_id'=>$this->session->userdata('user_id'),
						'type'=>'inventory',
						'action'=>'create',
						'response'=>$id,
						'fingerprint'=>$_SERVER['REMOTE_ADDR'],
					);
					$this->logs->add($logs);
    				$this->session->set_flashdata('error','items saved!');	
    			} else {
    				$this->session->set_flashdata('error','items not saved!');	
    			}
    			redirect('items');
    		} else {
    			$this->template->load('template','items/items_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->items_model->update($id,$_POST);
			$logs = array(
				'user_id'=>$this->session->userdata('user_id'),
				'type'=>'inventory',
				'action'=>'update',
				'response'=>$id,
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->logs->add($logs);
			$this->session->set_flashdata('error','items updated!');	
			redirect('items');
		} else {
			$data['items'] = $this->items_model->get_single($id);
			if(!$data['items']) {
				$this->session->set_flashdata('error','not a valid items!');	
				redirect('items');
			}
			$this->template->load('template','items/items_edit',$data);
		}
	}
	function view($id) {
		$data['items'] = $this->items_model->get_single($id);
		if(!$data['items']) {
			$this->session->set_flashdata('error','not a valid items!');	
			redirect('items');
		}
		$this->template->load('template','items/items_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->items_model->delete($id)) {
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'inventory',
					'action'=>'delete',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','items removed!');	
			} else {
				$this->session->set_flashdata('error','items not removed!');	
			}
		}
		redirect('items');
	}
}
?>