<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users {
	function is_logged_in($id = false) {
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == '') {
			return false;
		} else {
			return true;
		}
	}
	function is_admin($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "1") {
			return true;
		} else {
			return false;
		}
	}
	function is_hrd($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "6") {
			return true;
		} else {
			return false;
		}
	}
	function is_client($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "2") {
			return true;
		} else {
			return false;
		}
	}
	function is_msr($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "3") {
			return true;
		} else {
			return false;
		}
	}
	function is_warehouseman($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "4") {
			return true;
		} else {
			return false;
		}
	}
	
	function is_accountant($id = false){
		$CI =& get_instance();
		if($id === false) {
			$id = $CI->session->userdata('role_id');
		}
		if($id == "5") {
			return true;
		} else {
			return false;
		}
	}
}