<?php

class Warehouseman extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("user/user_model");
		$this->load->model("user/warehouseman_model");
	}
	function index($offset = 0){
		$this->display($offset);
	}
	function display($offset = 0) {
		if($this->users->is_admin()) {
			$this->load->library('pagination');
            $config['base_url'] = base_url().'user/display';
            $config['total_rows'] = $this->user_model->count_all();
            $config['per_page'] = 2;
            $this->pagination->initialize($config);
			
			$data['user'] = $this->user_model->get_all($offset,$config['per_page']);
			$this->template->load('template','user/user_list',$data);
		} else {
			$this->session->set_flashdata('error','NO_ACCESS');
            redirect();
		}
	}
	function create() {
		if(!empty($_POST)){
			$_POST['password'] = md5($_POST['password']);
			$id = $this->user_model->create($_POST);
			if($id) {
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'user',
					'action'=>'create',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','user saved!');	
			} else {
				$this->session->set_flashdata('error','user not saved!');	
			}
			redirect('user');
		} else {
			$this->template->load('template','user/user_create');
		}
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->user_model->update($id,$_POST);
			$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'user',
					'action'=>'update',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
			$this->session->set_flashdata('error','user updated!');	
			redirect('user');
		} else {
			$data['user'] = $this->user_model->get_single($id);
			if(!$data['user']) {
				$this->session->set_flashdata('error','not a valid user!');	
				redirect('user');
			}
			$this->template->load('template','user/user_edit',$data);
		}
	}
	function view($id) {
		$data['user'] = $this->user_model->get_single($id);
		if(!$data['user']) {
			$this->session->set_flashdata('error','not a valid user!');	
			redirect('user');
		}
		$this->template->load('template','user/user_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->user_model->delete($id)){
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'user',
					'action'=>'delete',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','user removed!');	
			} else {
				$this->session->set_flashdata('error','user not removed!');	
			}
		}
		redirect('user');
	}
	function login(){
		$data['user'] = $this->user_model->get_single($this->input->post('username'),true);
		if($data['user']) {
			if(md5($this->input->post('password')) == $data['user']->password) {
				$logs = array(
					'username'=>$this->input->post('username'),
					'user_id'=>$data['user']->user_id,
					'type'=>'login',
					'response'=>'login success',
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$user = array(
					'username'=>$this->input->post('username'),
					'user_id'=>$data['user']->user_id,
					'role_id'=>$data['user']->role_id
				);
				$this->session->set_userdata($user);
				$this->logs->add($logs);
                redirect('dashboard');
			} else {
				$logs = array(
					'username'=>$this->input->post('username'),
					'type'=>'login',
					'response'=>'login Failed - incorrect password',
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->session->set_flashdata('error','Invalid Password!');
				$this->logs->add($logs);
				redirect();
			}
		} else {
			$logs = array(
				'username'=>$this->input->post('username'),
				'type'=>'login',
				'response'=>'login Failed - invalid username',
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->session->set_flashdata('error','Invalid Username!');
			$this->logs->add($logs);
			redirect();
		}
	}
	function logout(){
        $logs = array(
			'username'=>$this->session->userdata('username'),
			'user_id'=>$this->session->userdata('user_id'),
			'type'=>'login',
			'response'=>'logout user',
			'fingerprint'=>$_SERVER['REMOTE_ADDR'],
		);
        $this->logs->add($logs);
		$this->session->sess_destroy();
		redirect();
	}
}
?>