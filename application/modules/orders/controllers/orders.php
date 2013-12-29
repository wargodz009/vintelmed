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
        if($this->users->is_admin() || $this->users->is_msr() || $this->users->is_accountant()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'orders/display';
            $config['per_page'] = 15;
			if($this->users->is_admin() || $this->users->is_accountant()) {
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
	function pre($order_id = 0) {
		 $this->load->library('pagination');
        if($this->users->is_admin()) {
			$data['orders'] = $this->orders_model->get_all(0,0,true,'pre');
		    $this->template->load('template','orders/orders_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function post($order_id = 0) {
		 $this->load->library('pagination');
        if($this->users->is_admin()) {
            $data['orders'] = $this->orders_model->get_all(0,0,true,'post');
		    $this->template->load('template','orders/orders_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function sign($loc,$order_id) {
		if($this->users->is_admin()) {
            $res = $this->orders_model->sign($order_id,$this->session->userdata('user_id'),$loc);
			if($res) {
				 $this->session->set_flashdata('error','Order signed!');
			}
        }
        redirect($_SERVER['HTTP_REFERER']);
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
			$data1 = array(
				'status'=>$this->input->post('status'),
			);
			$this->orders_model->update($id,$data1);
			$this->session->set_flashdata('error','orders updated!');	
			$items = $_POST['items'];
			$piece = $_POST['piece'];
			$item_batch_id = $_POST['item_batch_id'];
			if(!empty($items)) {
				foreach($items as $k=>$v) {
					$data = array(
						'order_id'=>$id,
						'item_id'=>$v,
						'item_batch_id'=>$item_batch_id[$k],
						'quantity'=>$piece[$k],
					);
					$this->orders_model->add($data);
				}
			}
			$logs = array(
				'user_id'=>$this->session->userdata('user_id'),
				'type'=>'order',
				'action'=>'update',
				'response'=>$id,
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->logs->add($logs);
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
	function complete($id) {
		$this->load->model('batch/batch_model');
		if($this->orders_model->get_single($id,'status') == 'approved') {
			$data1 = array(
				'status'=>'completed',
				'date_completed'=>date("Y-m-d"),
			);
			$this->orders_model->update($id,$data1);
			$logs = array(
				'user_id'=>$this->session->userdata('user_id'),
				'type'=>'order',
				'action'=>'completed an order',
				'response'=>$id,
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->logs->add($logs);
			$order_details = $this->orders_model->get_details($id);
			if(!empty($order_details)) {
				foreach($order_details as $x) {
					$this->batch_model->increment($x->item_batch_id,$x->quantity);
				}
			}
			$this->session->set_flashdata('error','order completed!');	
		} else {
			$this->session->set_flashdata('error','invalid item!');	
		}
		redirect('orders');
	}
	function upload($id){
		$this->load->helper('form');
		$this->load->model('order_files/order_files_model');
		if(!empty($_POST)) {
			$config['upload_path'] = './uploads/'.$this->orders_model->get_single($id,'form_number');
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xls|xlsx';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors(),'id'=>$id);
				$this->template->load('template','orders/upload_files',$error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data(),'id'=>$id,'error'=>'Upload Success!');
				$info = array(
					'order_id'=>$id,
					'description'=>$this->input->post('description'),
					'file_name'=>$data['upload_data']['file_name'],
				);
				$file_id = $this->order_files_model->create($info);
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'upload',
					'action'=>'uploaded a file',
					'response'=>$file_id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->template->load('template','orders/upload_files',$data);
			}
		} else {
			$data['error'] = '';
			$data['id'] = $id;
			$this->template->load('template','orders/upload_files',$data);
		}
	}
	function return_goods($id) {
		if(!empty($_POST)) {
			$item_batch_id = $_POST['item_batch_id'];
			$quantity = $_POST['quantity'];
			if(!empty($item_batch_id)) {
				foreach($item_batch_id as $k=>$v) {
					$data = array(
						'order_id'=>$this->input->post('order_id'),
						'item_batch_id'=>$item_batch_id[$k],
						'return_quantity'=>$quantity[$k],
						'remarks'=>$this->input->post('remarks'),
					);
					$this->orders_model->add_return($data);
					$this->orders_model->set_returned($id);
				}
				$this->session->set_flashdata('error','Orders return recorded!');	
			}
			redirect('orders');
		} else {
			if($this->orders_model->is_exist_order_return($id) == false) {
				$data['orders'] = $this->orders_model->get_single($id);
				$data['order_details'] = $this->orders_model->get_order_details($id);
				if(!$data['orders']) {
					$this->session->set_flashdata('error','not a valid orders!');	
					redirect('orders');
				}
				$this->template->load('template','orders/orders_return',$data);
			} else {
				$this->session->set_flashdata('error','Orders returned Already!');	
				redirect('orders');
			}
		}
	}
	function pay($order_id){
		if(!empty($_POST)) {
			$data = array(
				'order_id'=>$this->input->post('order_id'),
				'amount'=>$this->input->post('amount')
			);
			$this->orders_model->add_pay($data);
			$this->session->set_flashdata('error','Payment record added!');	
			redirect('orders');
		} else {
			$data['orders'] = $this->orders_model->get_single($order_id);
			$data['orders_paid'] = $this->orders_model->get_paid($order_id);
			if(!$data['orders']) {
				$this->session->set_flashdata('error','not a valid orders!');	
				redirect('orders');
			}
			$this->template->load('template','orders/orders_pay',$data);
		}
	}
}
?>