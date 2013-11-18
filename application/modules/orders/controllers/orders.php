<?php

class Orders extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("orders/orders_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin() || $this->users->is_msr()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'orders/display';
            $config['per_page'] = 15;
			if($this->users->is_admin()) {
				$config['total_rows'] = $this->orders_model->count_all();
				$data['orders'] = $this->orders_model->get_all($offset,$config['per_page']);
			} else {
				$config['total_rows'] = $this->orders_model->count_all($this->session->userdata('user_id'));
				$data['orders'] = $this->orders_model->get_all($offset,$config['per_page'],$this->session->userdata('user_id'));
			}
			$this->pagination->initialize($config); 
		    $this->template->load('template','orders/orders_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function user($id,$offset = 0) {
        if($this->users->is_admin() || $this->users->is_msr()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'orders/user';
            $config['per_page'] = 15;
			$config['total_rows'] = $this->orders_model->count_all_user($id);
			$data['orders'] = $this->orders_model->get_all_user($offset,$config['per_page'],$id);
			$this->pagination->initialize($config); 
		    $this->template->load('template','orders/orders_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create($user_id = false) {
        if($this->users->is_admin() || $this->users->is_msr()) {
    		if(!empty($_POST)){
    			if($this->orders_model->create($_POST)){
    				$this->session->set_flashdata('error','orders saved!');	
    			} else {
    				$this->session->set_flashdata('error','orders not saved!');	
    			}
    			redirect('orders');
    		} else {
				if($user_id != false) {
					$data['user_id'] = $user_id;
 					$this->template->load('template','orders/orders_create',$data);	
				} else {
					$this->template->load('template','orders/orders_create');
				}
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->orders_model->update($id,$_POST);
			$this->session->set_flashdata('error','orders updated!');	
			redirect('orders');
		} else {
			$data['orders'] = $this->orders_model->get_single($id);
			if(!$data['orders']) {
				$this->session->set_flashdata('error','not a valid orders!');	
				redirect('orders');
			}
			$this->template->load('template','orders/orders_edit',$data);
		}
	}
	function view($id) {
		$data['orders'] = $this->orders_model->get_single($id);
		if(!$data['orders']) {
			$this->session->set_flashdata('error','not a valid orders!');	
			redirect('orders');
		}
		$this->template->load('template','orders/orders_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->orders_model->delete($id)) {
				$this->session->set_flashdata('error','orders removed!');	
			} else {
				$this->session->set_flashdata('error','orders not removed!');	
			}
		}
		redirect('orders');
	}
	function cancel($id) {
		if(!empty($id)) {
			if($this->orders_model->cancel($id)) {
				$this->session->set_flashdata('error','orders cancelled!');	
			} else {
				$this->session->set_flashdata('error','error cancelling order!');	
			}
		}
		redirect('orders');
	}
	function manage($id) {
		if(!empty($_POST)) {
			$this->orders_model->update($id,$_POST);
			$this->session->set_flashdata('error','orders updated!');	
			redirect('orders');
		} else {
			$data['orders'] = $this->orders_model->get_single($id);
			if(!$data['orders']) {
				$this->session->set_flashdata('error','not a valid orders!');	
				redirect('orders');
			}
			$this->template->load('template','orders/orders_manage',$data);
		}
	}
}
?>