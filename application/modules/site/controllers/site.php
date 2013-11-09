<?php

class Site extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("user/user_model");
	}
	function emergency_access(){
		if(empty($_POST)) {
			$this->template->load('template','site/site_login');
		} else {
			$data['user'] = $this->user_model->get_single($this->input->post('username'),true);
			if($data['user']) {
				if(md5($this->input->post('password')) == $data['user']->password) {
					if($data['user']->status == 'enabled') {
						$logs = array(
							'username'=>$this->input->post('username'),
							'user_id'=>$data['user']->user_id,
							'type'=>'login',
							'response'=>'emergency login success',
							'fingerprint'=>$_SERVER['REMOTE_ADDR'],
						);
						$user = array(
							'username'=>$this->input->post('username'),
							'user_id'=>$data['user']->user_id,
							'role_id'=>$data['user']->role_id
						);
						$this->session->set_userdata($user);
						$this->logs->add($logs);
						$this->load->helper('cookie');
						$cookie = array(
							'name'   => 'emergency_access',
							'value'  => true,
							'expire' => time()+3600
						);
						set_cookie($cookie);
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
		}
	}
}
?>