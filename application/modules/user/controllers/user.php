<?php

class User extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("user/user_model");
	}
	function index(){
		$this->display();
	}
	function display(){
		$data['user'] = $this->user_model->get_all();
		$this->template->load('template','user/user_list',$data);
	}
	function create() {
		if(!empty($_POST)){
			$_POST['password'] = md5($_POST['password']);
			if($this->user_model->create($_POST)){
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
				$this->session->set_flashdata('error','user removed!');	
			} else {
				$this->session->set_flashdata('error','user not removed!');	
			}
		}
		redirect('user');
	}
	function login(){
		$data['user'] = $this->user_model->get_single($this->input->post('username'),true);
		if(md5($this->input->post('password')) == $data['user']->password) {
			$data = array(
				'username'=>$this->input->post('username'),
				'user_id'=>$data['user']->user_id,
				'type'=>'login',
				'response'=>'login success'
			);
		} else {
			$data = array(
				'username'=>$this->input->post('username'),
				'type'=>'login',
				'response'=>'login Failed'
			);
			echo 'error';
		}
		$this->logs->add($data);
	}
}
?>