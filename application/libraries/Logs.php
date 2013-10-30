<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs {
	function add($post = array()) {
		$CI =& get_instance();
		//types: 'login','item','report','user','admin','others'
		/* post param
			action
		 	fingerprint
			user_id
			response
			username
			item_id
			transaction_id
			report_id
			
			usage:
			$logs = array(
				'user_id'=>$this->session->userdata('user_id'),
				'type'=>'user',
				'action'=>'create',
				'response'=>$id,
				'fingerprint'=>$_SERVER['REMOTE_ADDR'],
			);
			$this->logs->add($logs);
		*/
		if($post['type'] == 'login') {
			$CI->db->insert('system_logs', $post); 
		} else if($post['type'] == 'user') {
			$CI->db->insert('system_logs', $post); 
		} else if($post['type'] == 'inventory') {
			$CI->db->insert('system_logs', $post); 
		} else {
			$CI->db->insert('system_logs', $post); 
		}
	}
}