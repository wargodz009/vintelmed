<?php
function get_batch($item_id){
	$CI =& get_instance();
	$CI->load->model('batch/batch_model');
	$item = $CI->batch_model->get_single($item_id);
	if($item) {
		$batch_id = trim($item->batch_id);
		return '<a target="_new" href="'.base_url().'batch/view/'.$item->item_batch_id.'">'.$batch_id.'</a>';
	} else {
		return 'Unknown Item';
	}
}