<?php

class Inventory extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("items/items_model");
	}
	function index() {
		$this->template->load('template','inventory/warehouseman_dashboard');
	}
	function display($offset = 0) {
        if($this->users->is_admin() || $this->users->is_warehouseman()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'inventory/display';
            $config['total_rows'] = $this->inventory_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['inventory'] = $this->inventory_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','inventory/inventory_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin() || $this->users->is_warehouseman()) {
    		if(!empty($_POST)){
				$id = $this->inventory_model->create($_POST);
    			if($id){
					$logs = array(
						'user_id'=>$this->session->userdata('user_id'),
						'type'=>'inventory',
						'action'=>'create',
						'response'=>$id,
						'fingerprint'=>$_SERVER['REMOTE_ADDR'],
					);
					$this->logs->add($logs);
    				$this->session->set_flashdata('error','inventory saved!');	
    			} else {
    				$this->session->set_flashdata('error','inventory not saved!');	
    			}
    			redirect('inventory');
    		} else {
    			$this->template->load('template','inventory/inventory_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->inventory_model->update($id,$_POST);
			$logs = array(
				'user_id'=>$this->session->userdata('user_id'),
				'type'=>'inventory',
				'action'=>'update',
				'response'=>$id,
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->logs->add($logs);
			$this->session->set_flashdata('error','inventory updated!');	
			redirect('inventory');
		} else {
			$data['inventory'] = $this->inventory_model->get_single($id);
			if(!$data['inventory']) {
				$this->session->set_flashdata('error','not a valid inventory!');	
				redirect('inventory');
			}
			$this->template->load('template','inventory/inventory_edit',$data);
		}
	}
	function view($id) {
		$data['inventory'] = $this->inventory_model->get_single($id);
		if(!$data['inventory']) {
			$this->session->set_flashdata('error','not a valid inventory!');	
			redirect('inventory');
		}
		$this->template->load('template','inventory/inventory_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->inventory_model->delete($id)) {
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'inventory',
					'action'=>'delete',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','inventory removed!');	
			} else {
				$this->session->set_flashdata('error','inventory not removed!');	
			}
		}
		redirect('inventory');
	}
	function search(){
		$res = $this->inventory_model->search($this->input->get('term'),true);
		$q = array();
		if(!empty($res)) {
			foreach($res as $k) {
				$q[$k['item_id']] = array(
					'value'=>$k['item_id'],
					'label'=>$k['name'].' - '.$k['description']
					);
			}
		}
		echo json_encode($q);
	}
	function is_valid(){
		echo urldecode($this->input->get('value'));
	}
	function get_price($item_id){
		echo $this->inventory_model->get_single($item_id,'price_standard');
	}
}
?>