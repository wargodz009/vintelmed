<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings {
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