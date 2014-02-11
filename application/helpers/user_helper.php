<?php
function get_name($user_id){
	$CI =& get_instance();
	$CI->load->model('user/user_model');
	$user = $CI->user_model->get_single($user_id);
	if($user) {
		if(!empty($user->first_name) && !empty($user->last_name)) {
			return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$user->first_name.', '.$user->last_name.'</a>';
		} else {
			return '<a target="_new" href="'.base_url().'user/view/'.$user->user_id.'">'.$user->username.'</a>';
		}
	} else {
		return 'Unknown user';
	}
}