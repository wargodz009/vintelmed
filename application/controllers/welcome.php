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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */