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
        if($this->users->is_admin() || $this->users->is_warehouseman()) {
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
	function list_all($item_id,$is_ajax = false) {
        if($this->users->is_admin() || $this->users->is_warehouseman() || $this->users->is_accountant()) {
            $data['batch'] = $this->batch_model->get_batches($item_id,true);
			if($is_ajax !== false) {
				if($data['batch'])
				echo json_encode($data['batch']);
				else 
				echo '';
			} else {
				$this->template->load('template','batch/batch_list',$data);
			}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create($item_id = '') {
        if($this->users->is_admin() || $this->users->is_warehouseman() || $this->users->is_accountant()) {
    		if(!empty($_POST)){
				$_POST['expire'] = date("Y-m-d",strtotime($_POST['expire']));
				$id = $this->batch_model->create($_POST);
    			if($id){
					$logs = array(
						'user_id'=>$this->session->userdata('user_id'),
						'type'=>'inventory item',
						'action'=>'create',
						'response'=>$id,
						'fingerprint'=>$_SERVER['REMOTE_ADDR'],
					);
					$this->logs->add($logs);
    				$this->session->set_flashdata('error','batch saved!');	
    			} else {
    				$this->session->set_flashdata('error','batch not saved!');	
    			}
    			redirect('batch');
    		} else {
				if($item_id != '') {
					$data['item_id'] = $item_id;
					if($this->users->is_accountant()) {
						$this->template->load('template','batch/batch_create_accountant',$data);
					} else {
						$this->template->load('template','batch/batch_create',$data);
					}
				} else {
					$this->template->load('template','batch/batch_create');
				}
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			if($this->users->is_admin() || $this->users->is_warehouseman()) {
				$this->batch_model->update($id,$_POST);
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'inventory item',
					'action'=>'update',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','batch updated!');	
				redirect('batch');
			} else {
				$this->session->set_flashdata('error','NO_ACCESS');
				redirect();
			}
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
			if($this->users->is_admin()) {
				if($this->batch_model->delete($id)) {
					$logs = array(
						'user_id'=>$this->session->userdata('user_id'),
						'type'=>'inventory item',
						'action'=>'delete',
						'response'=>$id,
						'fingerprint'=>$_SERVER['REMOTE_ADDR'],
					);
					$this->logs->add($logs);
					$this->session->set_flashdata('error','batch removed!');	
				} else {
					$this->session->set_flashdata('error','batch not removed!');	
				}
			} else {
				$this->session->set_flashdata('error','NO_ACCESS');
				redirect();
			}
		}
		redirect('batch');
	}
}
?>