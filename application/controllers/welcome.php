<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->users->is_logged_in() === false) {
			$this->template->load('template','login_page');
		} else {
			redirect('dashboard');
		}
	}
	public function clients_page()
	{
		$this->load->view('clients.html');
	}
	public function employees_page()
	{
		$this->load->view('employees.html');
	}
	public function inventory_page()
	{
		$this->load->view('inventory.html');
	}
	public function orders_page()
	{
		$this->load->view('orders.html');
	}
	public function settings_page()
	{
		$this->load->view('settings.html');
	}
	public function reports_page()
	{
		$this->load->view('reports.html');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */