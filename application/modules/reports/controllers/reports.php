<?php

class Reports extends MX_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('reports/report_model');
		$this->load->model('items/items_model');
		$this->load->model('item_type/item_type_model');
		$this->load->model('batch/batch_model');
	}
	function index() {
		if($this->input->post('report_for') != '') {
			$data['report_type'] = $this->input->post('report_for');
			switch($this->input->post('report_for')) {
				case 'SALES_AND_COLLECTION_UPDATES'; $this->template->load('template','reports/forms/sales_and_collection_updates',$data); break;
				case 'ACCOUNTS_RECIEVABLE'; $this->template->load('template','reports/forms/accounts_recievable',$data); break;
				case 'STATEMENT_OF_ACCOUNT'; $this->template->load('template','reports/forms/statement_of_account',$data); break;
				case 'STATEMENT_OF_ACCOUNTS_OF_CLIENTS_WITH_CONTRACT'; $this->template->load('template','reports/forms/statement_of_accounts_of_clients_with_contract',$data); break;
				case 'PESO_QUANTITY'; $this->template->load('template','reports/forms/peso_quantity',$data); break;
				case 'INVENTORY'; $this->template->load('template','reports/forms/inventory',$data); break;
				case 'MONTHLY_RETURN_GOODS_SLIP'; $this->template->load('template','reports/forms/monthly_return_goods_slip',$data); break;
				case 'NEAR_EXPIRY'; $this->template->load('template','reports/forms/near_expiry',$data); break;
				case 'SUMMARY_OF_CRITICAL_STOCKS'; $this->template->load('template','reports/forms/summary_of_critical_stocks',$data); break;
				case 'SUMMARY_OF_EXPIRED_PRODUCTS'; $this->template->load('template','reports/forms/summary_of_expired_products',$data); break;
				default: 
					$this->session->set_flashdata('error','INVALID_REPORT_TYPE');
					redirect('reports'); break;
			}
		} else {
			$this->template->load('template','reports/reports_index');
		}
	}
	function generate() {
		if($this->input->post('user_id') != '' && $this->input->post('report_type') != '') {
			$data['report_id'] = $this->report_model->create($_POST);
			$data['report_for'] = $this->input->post('report_for');
			if($data['report_id']) {
				$logs = array(
					'user_id'=>$this->session->userdata('user_id'),
					'type'=>'generate report',
					'action'=>'create report',
					'response'=>$data['report_id'],
					'fingerprint'=>$_SERVER['REMOTE_ADDR'],
				);
				$this->logs->add($logs);
				$this->session->set_flashdata('error','REPORT_GENERATED! <a href="'.base_url().'reports/view/'.$data['report_id'].'">VIEW</a>');
			} else {
				$this->session->set_flashdata('error','ERROR_CREATING_REPORT');
			}
			redirect('reports'); 
		} else {
			$this->template->load('template','reports/reports_create');
		}
	}
	function list_all($offset = 0) {
		$this->load->library('pagination');
		$config['base_url'] = base_url().'reports/list_all';
		$config['total_rows'] = $this->report_model->count_all();
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		$data['all_reports'] = $this->report_model->get_all($offset,$config['per_page']);
		$this->template->load('template','reports/reports_list',$data);
	}
	function view($report_id,$template = 'default') {
		$data['template'] = $template;
		//$this->output->enable_profiler(true);
		$report = $this->report_model->get_single($report_id);
		if($report) {
			$data['report'] = $report;
			switch($report->report_type) {
				case 'INVENTORY': 
				$data['items'] = $this->report_model->get_inventory_items($report->report_for);
				if($template != 'default') {
					$this->load->view('reports/reports/inventory_report',$data); break;
				}
				$this->template->load('template','reports/reports/inventory_report',$data); break;
				case 'NEAR_EXPIRY': 
				$date1 = date("Y/m/d",strtotime($report->date_start));
				$date2 = date("Y/m/d",strtotime($date1." + ".$this->settings->get('expire_near')." months"));
				$data['items'] = $this->report_model->get_near_expiry_items($date1,$date2);
				if($template != 'default') {
					$this->load->view('reports/reports/near_expiry',$data); break;
				}
				$this->template->load('template','reports/reports/near_expiry',$data); break;
				case 'SUMMARY_OF_CRITICAL_STOCKS': 
				$date1 = date("Y/m/d",strtotime($report->date_start));
				$data['items'] = $this->report_model->get_critical_items($date1);
				if($template != 'default') {
					$this->load->view('reports/reports/summary_of_critical_stocks',$data); break;
				}
				$this->template->load('template','reports/reports/summary_of_critical_stocks',$data); break;
				case 'MONTHLY_RETURN_GOODS_SLIP': 
				$date_from = date("Y/m/d",strtotime($report->date_start));
				$date_to = date("Y/m/d",strtotime($report->date_end));
				$data['items'] = $this->report_model->get_returned_goods($date_from,$date_to);
				if($template != 'default') {
					$this->load->view('reports/reports/monthly_return_goods_slip',$data); break;
				}
				$this->template->load('template','reports/reports/monthly_return_goods_slip',$data); break;
				case 'SUMMARY_OF_EXPIRED_PRODUCTS': 
				$date1 = date("Y/m/d",strtotime($report->date_start));
				$date2 = date("Y/m/d",strtotime($report->date_end));
				$data['items'] = $this->report_model->get_near_expiry_items($date1,$date2);
				if($template != 'default') {
					$this->load->view('reports/reports/summary_of_expired_products',$data); break;
				}
				$this->template->load('template','reports/reports/summary_of_expired_products',$data); break;
				default: $this->template->load('template','reports/reports_view',$report); break;
			}
		} else {
			$this->session->set_flashdata('error','INVALID_REPORT');
			redirect('reports'); 
		}
	}
}
?>