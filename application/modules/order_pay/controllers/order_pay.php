<?php

class Order_pay extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("order_pay/order_pay_model");
	}
	function index($id = 0) {
		$this->list_all($id);
	}
	function list_all($id,$offset = 0) {
		if($id != 0) {
			$this->load->library('pagination');
            $config['base_url'] = base_url().'order_pay/list_all';
            $config['total_rows'] = $this->order_pay_model->get_some($id,0,0,true);
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
			
			$data['order_pay'] = $this->order_pay_model->get_some($id,$offset,$config['per_page']);
			$data['id'] = $id;
			$this->template->load('template','order_pay/order_pay_list',$data);
		} else {
			$this->session->set_flashdata('error','invalid file group!');	
			redirect();
		}
	}
	function delete($id){
		$file = $this->order_pay_model->get_single($id);
		if(!empty($id)) {
			if($this->order_pay_model->delete($id)) {
				$this->session->set_flashdata('error','crud removed!');	
			} else {
				$this->session->set_flashdata('error','crud not removed!');	
			}
		}
		@unlink('./uploads/'.$file->file_name);
		$logs = array(
			'user_id'=>$this->session->userdata('user_id'),
			'type'=>'other',
			'action'=>'delete an upload file',
			'response'=>$id,
			'fingerprint'=>$_SERVER['REMOTE_ADDR'],
		);
		redirect('order_pay');
	}
}
?>