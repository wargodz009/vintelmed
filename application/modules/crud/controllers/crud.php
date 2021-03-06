<?php

class Crud extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model("crud/crud_model");
	}
	function index($offset = 0) {
		$this->display($offset);
	}
	function display($offset = 0) {
        if($this->users->is_admin()) {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'crud/display';
            $config['total_rows'] = $this->crud_model->count_all();
            $config['per_page'] = 15;
            $this->pagination->initialize($config); 
            
            $data['crud'] = $this->crud_model->get_all($offset,$config['per_page']);
		    $this->template->load('template','crud/crud_list',$data);
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function create() {
        if($this->users->is_admin()) {
    		if(!empty($_POST)){
    			if($this->crud_model->create($_POST)){
    				$this->session->set_flashdata('error','crud saved!');	
    			} else {
    				$this->session->set_flashdata('error','crud not saved!');	
    			}
    			redirect('crud');
    		} else {
    			$this->template->load('template','crud/crud_create');
    		}
        } else {
            $this->session->set_flashdata('error','NO_ACCESS');
            redirect();
        }
	}
	function edit($id) {
		if(!empty($_POST)) {
			$this->crud_model->update($id,$_POST);
			$this->session->set_flashdata('error','crud updated!');	
			redirect('crud');
		} else {
			$data['crud'] = $this->crud_model->get_single($id);
			if(!$data['crud']) {
				$this->session->set_flashdata('error','not a valid crud!');	
				redirect('crud');
			}
			$this->template->load('template','crud/crud_edit',$data);
		}
	}
	function view($id) {
		$data['crud'] = $this->crud_model->get_single($id);
		if(!$data['crud']) {
			$this->session->set_flashdata('error','not a valid crud!');	
			redirect('crud');
		}
		$this->template->load('template','crud/crud_view',$data);
	}
	function delete($id) {
		if(!empty($id)) {
			if($this->crud_model->delete($id)) {
				$this->session->set_flashdata('error','crud removed!');	
			} else {
				$this->session->set_flashdata('error','crud not removed!');	
			}
		}
		redirect('crud');
	}
	function testxls(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename='just_some_random_name.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
					 
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}
?>