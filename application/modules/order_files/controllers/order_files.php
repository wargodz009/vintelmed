<?php

class Order_files extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("order_files/order_files_model");
	}
	function index($id = 0) {
		$this->list_all($id);
	}
	function list_all($id) {
		if($id != 0) {
			$data['order_files'] = $this->order_files_model->get_some($id);
			$data['id'] = $id;
			$this->template->load('template','order_files/order_files_list',$data);
		} else {
			$this->session->set_flashdata('error','invalid file group!');	
			redirect();
		}
	}
	function delete($id){
		$file = $this->order_files_model->get_single($id);
		if(!empty($id)) {
			if($this->order_files_model->delete($id)) {
				$this->session->set_flashdata('error','crud removed!');	
			} else {
				$this->session->set_flashdata('error','crud not removed!');	
			}
		}
		@unlink('./uploads/'.$file->file_name);
		redirect('order_files');
	}
}
?>