<?php

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("user/user_model");
	}
	function index($offset = 0){
		if($this->users->is_admin()) {
			$this->display($offset);
		} else {
			$this->view();
		}
	}
	function display($offset = 0){
		if($this->users->is_admin()) {
			$this->load->library('pagination');
            $config['base_url'] = base_url().'user/display';
            $config['total_rows'] = $this->user_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config);
			
			$data['user'] = $this->user_model->get_all($offset,$config['per_page']);
			$this->template->load('template','user/user_list',$data);
		} else {
			$this->session->set_flashdata('error','NO_ACCESS');
            redirect();
		}
	}
	function create() {
		if(isset($_POST['role_id']) && isset($_POST['username']) && isset($_POST['password']) && $_POST['role_id'] != ''){
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
			if(isset($_POST['role_id']) && $_POST['role_id'] == '') {
				$this->session->set_flashdata('error','Please select user role!');	
			}
			$this->template->load('template','user/user_create');
		}
	}
	function edit($id = false) {
		if($id === false) {
			$id = $this->session->userdata('user_id');
		}
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
	function view($id = false) {
		if($id === false) {
			$id = $this->session->userdata('user_id');
		}
		$data['user'] = $this->user_model->get_single($id);
		if(!$data['user']) {
			$this->session->set_flashdata('error','not a valid user!');	
			redirect('user');
		}
		$this->template->load('template','user/user_view',$data);
	}
	function profile() {
		$id = $this->session->userdata('user_id');
		$data['user'] = $this->user_model->get_single($id);
		if(!$data['user']) {
			$this->session->set_flashdata('error','not a valid user!');	
			redirect('user');
		}
		$this->template->load('template','user/user_profile',$data);
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
		redirect($_SERVER['HTTP_REFERER']);
	}
	function activate($id) {
		if(!empty($id)) {
			if($this->user_model->activate($id)){
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'user',
					'action'=>'activate',
					'response'=>$id,
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','user activated!');	
			} else {
				$this->session->set_flashdata('error','user not activated!');	
			}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	function login(){
		if(!empty($_POST)) {
			$data['user'] = $this->user_model->get_single($this->input->post('username'),true);
			if($data['user']) {
				if(md5($this->input->post('password')) == $data['user']->password) {
					if($data['user']->status == 'enabled') {
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
							'user_id'=>$data['user']->user_id,
							'type'=>'login',
							'response'=>'login failed. user disabled',
							'fingerprint'=>$_SERVER['REMOTE_ADDR'],
						);
						$user = array(
							'username'=>$this->input->post('username'),
							'user_id'=>$data['user']->user_id,
							'role_id'=>$data['user']->role_id
						);
						$this->session->set_flashdata('error','Login failed! user account disabled. this transaction is recorded.');
						$this->logs->add($logs);
						redirect();
					}
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
		} else {
			$this->template->load('template','login_page');
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
		$this->load->helper('cookie');
		$cookie = get_cookie('emergency_access');
		if(isset($cookie)) {
			delete_cookie('emergency_access');
		}
		redirect();
	}
	function manage($user_id = '') {
		$data['user'] = $this->user_model->get_single($user_id);
		if($data['user']) {
			$this->load->helper('form');
			$this->load->helper('array');
			$this->load->model('client_model');
			$this->load->model('medrep_model');
			if($data['user']->role_id == 2) {
				$data['all_medrep'] = $this->client_model->get_medreps($user_id);
				$data['medrep'] = $this->medrep_model->get_all();
				$this->template->load('template','user/manage_client_view',$data);
			} else if($data['user']->role_id == 3) {
				$data['client'] = $this->client_model->get_all();
				$data['all_clients'] = $this->medrep_model->get_clients($user_id);
				$this->template->load('template','user/manage_medrep_view',$data);
			} else {
				$this->template->load('template','user/manage_default_view',$data);
			}
		} else {
			$this->session->set_flashdata('error','Invalid User!');
			redirect();
		}
	}
	function add_client($msr_id,$client_id){
		if($this->user_model->assign($msr_id,$client_id)){
			$this->session->set_flashdata('error','Successfull Assigned!!');
		} else {
			$this->session->set_flashdata('error','Error While Trying to Assign!!');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	function del_client($msr_id,$client_id){
		if($this->user_model->unassign($msr_id,$client_id)){
			$this->session->set_flashdata('error','Unssigned!!');
		} else {
			$this->session->set_flashdata('error','Error While Trying to Unassign!!');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>