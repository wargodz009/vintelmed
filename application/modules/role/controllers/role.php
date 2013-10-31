<?php

class Role extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("role/role_model");
	}
	function index($offset = 0){
		$this->display($offset);
	}
	function display($offset = 0){
		$this->load->library('pagination');
		$config['base_url'] = base_url().'role/display';
		$config['total_rows'] = $this->role_model->count_all();
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		
		$data['role'] = $this->role_model->get_all($offset,$config['per_page']);
		$this->template->load('template','role/role_list',$data);
	}
	function create() {
		if(!empty($_POST)){
			$_POST['password'] = md5($_POST['password']);
			if($this->role_model->create($_POST)){
				$this->session->set_flashdata('error','role saved!');	
			} else {
				$this->session->set_flashdata('error','role not saved!');	
			}
			redirect('role');
		} else {
			$this->template->load('template','role/role_create');
		}
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->role_model->update($id,$_POST);
			$this->session->set_flashdata('error','role updated!');	
			redirect('role');
		} else {
			$data['role'] = $this->role_model->get_single($id);
			if(!$data['role']) {
				$this->session->set_flashdata('error','not a valid role!');	
				redirect('role');
			}
			$this->template->load('template','role/role_edit',$data);
		}
	}
	function view($id) {
		$data['role'] = $this->role_model->get_single($id);
		if(!$data['role']) {
			$this->session->set_flashdata('error','not a valid role!');	
			redirect('role');
		}
		$this->template->load('template','role/role_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->role_model->delete($id)){
				$this->session->set_flashdata('error','role removed!');	
			} else {
				$this->session->set_flashdata('error','role not removed!');	
			}
		}
		redirect('role');
	}
	function login(){
		$data['role'] = $this->role_model->get_single($this->input->post('rolename'),true);
		if($data['role']) {
			if(md5($this->input->post('password')) == $data['role']->password) {
				$logs = array(
					'rolename'=>$this->input->post('rolename'),
					'role_id'=>$data['role']->role_id,
					'type'=>'login',
					'response'=>'login success',
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$role = array(
					'rolename'=>$this->input->post('rolename'),
					'role_id'=>$data['role']->role_id,
					'role_id'=>$data['role']->role_id
				);
				$this->session->set_roledata($role);
				$this->logs->add($logs);
                redirect('dashboard');
			} else {
				$logs = array(
					'rolename'=>$this->input->post('rolename'),
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
				'rolename'=>$this->input->post('rolename'),
				'type'=>'login',
				'response'=>'login Failed - invalid rolename',
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->session->set_flashdata('error','Invalid Rolename!');
			$this->logs->add($logs);
			redirect();
		}
	}
	function logout(){
        $logs = array(
			'rolename'=>$this->session->roledata('rolename'),
			'role_id'=>$this->session->roledata('role_id'),
			'type'=>'login',
			'response'=>'logout role',
			'fingerprint'=>$_SERVER['REMOTE_ADDR'],
		);
        $this->logs->add($logs);
		$this->session->sess_destroy();
		redirect();
	}
}
?>