<?php
function get_item($item_id,$include_description = true){
	$CI =& get_instance();
	$CI->load->model('items/items_model');
	$item = $CI->items_model->get_single($item_id);
	if($item) {
		$name = trim($item->name);
		$generic_name = trim($item->generic_name);
		$description = trim($item->description);
		if($include_description == false) {
			return '<a target="_new" href="'.base_url().'items/view/'.$item->item_id.'">'.$name.'</a>';
		} else {
			return '<a target="_new" href="'.base_url().'items/view/'.$item->item_id.'">'.$name.' ('.$description.')'.'</a>';
		}
	} else {
		return 'Unknown Item';
	}
}