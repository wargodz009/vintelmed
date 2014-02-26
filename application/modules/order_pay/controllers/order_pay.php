<?php

class Order_pay extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("order_pay/order_pay_model");
		$this->load->model("orders/orders_model");
	}
	function index($id = 0) {
		$this->list_all($id);
	}
	function multipay(){
		if(!empty($_POST)) {
			$data = $_POST;
			unset($data['so_number']);
			unset($data['solo_amount']);
			$ctr = 0;
			if(! is_array($_POST['so_number'])) {
				$data['amount'] = $_POST['solo_amount'];
				$data['order_id'] = $this->orders_model->get_id_from_so($x);
				$this->orders_model->add_pay($data);
			} else {
				foreach($_POST['so_number'] as $x){
					$data['order_id'] = $this->orders_model->get_id_from_so($x);
					$data['amount'] = $_POST['solo_amount'][$ctr];
					$data['invoice_id'] = $_POST['invoice_id'][$ctr];
					$this->orders_model->add_pay($data);
					$ctr++;
				}
			}
			$this->session->set_flashdata('error','Payment Saved!!');
			redirect('order_pay/multipay');
		} else {
			$this->template->load('template','order_pay/order_pay_multi');
		}
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
}
?>