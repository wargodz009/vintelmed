<?php
//collection controller
class Collection extends MX_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('reports/report_model');
		$this->load->model('items/items_model');
		$this->load->model('item_type/item_type_model');
		$this->load->model('batch/batch_model');
		$this->load->model('user/medrep_model');
	}
	function get_current($month = '',$year='',$area=0) {
		return $this->report_model->get_collections();
	}
}
?>