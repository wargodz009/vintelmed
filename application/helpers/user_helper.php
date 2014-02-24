<?php
function get_name($user_id){
	$CI =& get_instance();
	$CI->load->model('user/user_model');
	$user = $CI->user_model->get_single($user_id);
	if($user) {
		$fname = trim($user->first_name);
		$lname = trim($user->last_name);
		$uname = trim($user->username);
		if(!empty($fname) && !empty($lname)) {
			return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$lname.', '.$fname.'</a>';
		} else if(empty($fname) || empty($lname)) {
			if(!empty($fname) && empty($lname)) {
				return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$fname.'</a>';
			} else {
				if(!empty($lname)) {
					return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$lname.'</a>';
				}
				if(!empty($uname)) {
					return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$uname.'</a>';
				}
			}
			return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$lname.', '.$fname.'</a>';
		} else {
			return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$fname.'</a>';
		}
	} else {
		return 'Unknown user';
	}
}