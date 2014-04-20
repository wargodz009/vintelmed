<?php
//sales and collection controller
class Sac extends MX_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('reports/report_model');
		$this->load->model('items/items_model');
		$this->load->model('item_type/item_type_model');
		$this->load->model('batch/batch_model');
		$this->load->model('user/medrep_model');
	}
	function get_current($month = '',$year='',$area=0) {
		//$this->output->enable_profiler(true);
		$medrep_sales = array();
		if($month == '') 
			$month = date('m');
		if($year == '') 
			$year = date('Y');
			
		//get all medrep
		$all_medrep = $this->medrep_model->get_all($area);
		if(!empty($all_medrep)) {
			//get each medrep unique id
			foreach($all_medrep as $medrep) {
				$all_msr_client_id = $this->medrep_model->get_clients($medrep->user_id);
				$total_sold_items = 0;
				if(!empty($all_msr_client_id)) {
					//get each unique ids orders
					foreach($all_msr_client_id as $msr) {
						$all_sold_by_msr = $this->report_model->get_sold_items($msr->msr_client_id,$month,$year);
						if(!empty($all_sold_by_msr)) {
							//each orders add
							foreach($all_sold_by_msr as $item) {
								$total_sold_items += $this->calc->total($item->price,$item->quantity,$item->discount);
							}
						} else {
							//echo 'this medrep has no sold items yet! '.get_name($medrep->user_id).'<br/>';
						}
					}
				} else {
					//echo 'this medrep has no client to medrep relation yet '.get_name($medrep->user_id).'<br/>';
				}
				if($total_sold_items != 0) {
					$medrep_sales[] = array(
						'total_sold_items'=>$total_sold_items,
						'user_id'=>$medrep->user_id,
						'quota'=>$medrep->quota,
						'area'=>$medrep->area,
						'district_id'=>$medrep->district_id,
					);
				}
			}
		}
		return $medrep_sales;
	}
}
?>