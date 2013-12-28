<?php

class Reports extends CI_Controller{
	function __construct() {
		parent::__construct();
	}
	function index() {
		if($this->input->post('report_for') != '') {
			switch($this->input->post('report_for')) {
				case 'SALES_AND_COLLECTION_UPDATES'; $this->template->load('template','reports/forms/sales_and_collection_updates'); break;
				case 'ACCOUNTS_RECIEVABLE'; $this->template->load('template','reports/forms/accounts_recievable'); break;
				case 'STATEMENT_OF_ACCOUNT'; $this->template->load('template','reports/forms/statement_of_account'); break;
				case 'STATEMENT_OF_ACCOUNTS_OF_CLIENTS_WITH_CONTRACT'; $this->template->load('template','reports/forms/statement_of_accounts_of_clients_with_contract'); break;
				case 'PESO_QUANTITY'; $this->template->load('template','reports/forms/peso_quantity'); break;
				case 'INVENTORY'; $this->template->load('template','reports/forms/inventory'); break;
				case 'MONTHLY_RETURN_GOODS_SLIP'; $this->template->load('template','reports/forms/monthly_return_goods_slip'); break;
				case 'NEAR_EXPIRY'; $this->template->load('template','reports/forms/near_expiry'); break;
				case 'SUMMARY_OF_CRITICAL_STOCKS'; $this->template->load('template','reports/forms/summary_of_critical_stocks'); break;
				case 'SUMMARY_OF_EXPIRED_PRODUCTS'; $this->template->load('template','reports/forms/summary_of_expired_products'); break;
				default: 
					$this->session->set_flashdata('error','INVALID_REPORT_TYPE');
					redirect('reports'); break;
			}
		} else {
			$this->template->load('template','reports/reports_index');
		}
	}
	function generate() {
		$this->template->load('template','reports/reports_create');
	}
	function list_all() {
		$this->template->load('template','reports/reports_list');
	}
	function view($report_id) {
		$this->template->load('template','reports/reports_view');
	}
}
?>