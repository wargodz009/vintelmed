<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users {
	function is_logged_in() {
		$CI =& get_instance();
		if($CI->session->userdata('user_id') == '') {
			return false;
		} else {
			return true;
		}
	}
    function is_admin() {
		$CI =& get_instance();
		if($CI->session->userdata('role_id') == '1') {
			return true;
		} else {
			return false;
		}
	}
}