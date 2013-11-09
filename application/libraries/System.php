<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System {
	function is_open(){
		$CI =& get_instance();
		if(strtotime($this->get_time()) >= strtotime($this->get('time_open')) && strtotime($this->get_time()) <= strtotime($this->get('time_close'))) {
			return true;
		}
		$CI->load->helper('cookie');
		$emergency_cookie = get_cookie('emergency_access');
		if(!empty($emergency_cookie)) {
			return true;
		}
		return false;
	}
	function get_time(){
		date_default_timezone_set($this->get("time_zone"));
		return strtolower(date("h:i a"));
	}
	function get($name,$type = 'value') {
		//$type : value:all
		$CI =& get_instance();
		$CI->db->from('system_setting');
		$Q = $CI->db->where('name',$name);
		return ($type=='value'?$Q->get()->row()->value:$Q->get()->row());
	}
}