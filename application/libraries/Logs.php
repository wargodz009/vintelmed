<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs {
	function add($post = array()) {
		$CI =& get_instance();
		//types: 'login','inventory','report','user','admin','others'
		/* post param
			action
		 	fingerprint
			user_id
			response
			username
			item_id
			transaction_id
			report_id
		*/
		if($post['type'] == 'login') {
			$CI->db->insert('system_logs', $post); 
		} else {
			//do nothing;
		}
	}
}