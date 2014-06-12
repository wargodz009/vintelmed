<?php

class Order_free extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("order_free/order_free_model");
	}
	function index($id = 0) {
		$this->list_all($id);
	}
	function list_all($id) {
		$this->load->model("orders/orders_model");
		if($id != 0) {
			$data['order_free'] = $this->order_free_model->get_some($id);
			$data['id'] = $id;
			$this->template->load('template','order_free/order_free_list',$data);
		} else {
			$this->session->set_flashdata('error','invalid file group!');	
			redirect();
		}
	}
	function delete($id){
		$this->load->model("orders/orders_model");
		$file = $this->order_free_model->get_single($id);
		if(!empty($id)) {
			if($this->order_free_model->delete($id)) {
				$this->session->set_flashdata('error','File removed!');	
			} else {
				$this->session->set_flashdata('error','File not removed!');	
			}
		}
		@unlink('./uploads/'.$this->orders_model->get_single($file->order_id,'form_number').'/'.$file->file_name);
		$logs = array(
			'user_id'=>$this->session->userdata('user_id'),
			'type'=>'other',
			'action'=>'delete an upload file',
			'response'=>$id,
			'fingerprint'=>$_SERVER['REMOTE_ADDR'],
		);
		$this->logs->add($logs);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>