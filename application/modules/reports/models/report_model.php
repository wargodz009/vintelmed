<?php

class Report_model extends CI_Model{
var $table = 'reports';
var $user = 'users';
var $items = 'items';
var $batch = 'item_batch';
var $suppliers = 'suppliers';
var $item_types = 'item_types';
var $orders = 'orders';
var $order_details = 'order_details';
var $order_return = 'order_return';
var $order_pay = 'order_pay';
	function get_all($offset = 0,$limit = 0) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }   
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('report_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid reports');
		} else {
			return $q->row();
		}
	}
	function count_all() {
		return $this->db->count_all($this->table);
	}
	function create($data) {
		$this->db->insert($this->table,$data);
		if($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function update($id,$data) {
		$this->db->where('report_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('report_id',$id);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	/* INVENTORY */
	function get_inventory_items($type = 0) {
		$this->db->select('*,'.$this->suppliers.'.name as supplier_name,'.$this->item_types.'.name as item_type_name,'.$this->items.'.name as item_name');
		$this->db->join($this->suppliers,$this->suppliers.'.supplier_id = '.$this->batch.'.supplier_id','LEFT');
		$this->db->join($this->items,$this->items.'.item_id = '.$this->batch.'.item_id','LEFT');
		$this->db->join($this->item_types,$this->item_types.'.item_type_id = '.$this->items.'.item_type_id','LEFT');
		if($type != 0) {
			$this->db->where($this->item_types.'.item_type_id',$type);
		}
		$q = $this->db->get($this->batch);
		return $q->result();
	}
	function get_item_average_usage($batch_id,$start,$end = false){
		$this->db->select("avg(".$this->order_details.".quantity) as avg_qty");
		$this->db->where($this->order_details.'.item_batch_id',$batch_id);
		$this->db->where($this->orders.'.status','completed');
		if($end != false) {
			$this->db->where("date_completed BETWEEN '$start' AND '$end'");
		} else {
			$this->db->where("date_completed",$start);
		}
		$this->db->join($this->order_details,$this->order_details.'.order_id = '.$this->orders.'.order_id');
		$q = $this->db->get($this->orders);
		return @floor($q->row()->avg_qty);
	}
	function get_item_sum_usage($batch_id,$start,$end = false){
		$this->db->select("sum(".$this->order_details.".quantity) as sum_qty");
		$this->db->where($this->order_details.'.item_batch_id',$batch_id);
		$this->db->where($this->orders.'.status','completed');
		if($end != false) {
			$this->db->where("date_completed BETWEEN '$start' AND '$end'");
		} else {
			$this->db->where("date_completed",$start);
		}
		$this->db->join($this->orders,$this->order_details.'.order_id = '.$this->orders.'.order_id');
		$q = $this->db->get($this->order_details);
		return (isset($q->row()->sum_qty)?$q->row()->sum_qty:0);
	}
	function get_item_sum_returned($batch_id,$start,$end = false){
		$this->db->select("sum(".$this->order_details.".quantity) as sum_qty, ".$this->order_return.".orders_return_id");
		$this->db->where($this->order_details.'.item_batch_id',$batch_id);
		$this->db->where($this->orders.'.status','returned');
		if($end != false) {
			$this->db->where("date_cancelled BETWEEN '$start' AND '$end'");
		} else {
			$this->db->where("date_cancelled",$start);
		}
		$this->db->join($this->orders,$this->order_details.'.order_id = '.$this->orders.'.order_id','LEFT');
		$this->db->join($this->order_return,$this->order_return.'.order_id = '.$this->orders.'.order_id','LEFT');
		$q = $this->db->get($this->order_details);
		$data['return_id'] = (@$q->row()->return_id?$q->row()->return_id:'-');
		$data['sum_qty'] = (isset($q->row()->sum_qty)?$q->row()->sum_qty:0);
		return $data;
	}
	function get_item_sum_new($item_id,$start,$end = false){
		$this->db->select("sum(".$this->batch.".item_count) as sum_qty");
		$this->db->where($this->items.'.item_id',$item_id);
		if($end != false) {
			$this->db->where("recieve_date BETWEEN '$start' AND '$end'");
		} else {
			$this->db->where("recieve_date",$start);
		}
		$this->db->join($this->items,$this->items.'.item_id = '.$this->batch.'.item_id');
		$q = $this->db->get($this->batch);
		return (isset($q->row()->sum_qty)?$q->row()->sum_qty:0);
	}
	/* NEAR EXPIRY, EXPIRING */
	function get_near_expiry_items($date,$expire_date){
		$this->db->select('*,'.$this->items.'.name as items_name');
		$this->db->join($this->suppliers,$this->suppliers.'.supplier_id = '.$this->batch.'.supplier_id');
		$this->db->join($this->items,$this->items.'.item_id = '.$this->batch.'.item_id');
		$this->db->join($this->item_types,$this->item_types.'.item_type_id = '.$this->items.'.item_type_id');
		$this->db->where("expire BETWEEN '$date' AND '$expire_date'");
		$this->db->order_by('expire','asc');
		$q = $this->db->get($this->batch);
		return $q->result();
	}
	
	/* CRITICAL PRODUCTS */
	function get_critical_items($date){
		$this->db->select('*,'.$this->items.'.name as items_name');
		$this->db->join($this->suppliers,$this->suppliers.'.supplier_id = '.$this->batch.'.supplier_id');
		$this->db->join($this->items,$this->items.'.item_id = '.$this->batch.'.item_id');
		$this->db->join($this->item_types,$this->item_types.'.item_type_id = '.$this->items.'.item_type_id');
		$q = $this->db->get($this->batch);
		return $q->result();
	}
	
	function get_returned_goods($date_from,$date_to) {
		$this->db->where("date_cancelled BETWEEN '$date_from' AND '$date_to'");
		$this->db->where($this->orders.'.status','returned');
		$this->db->join($this->order_return,$this->order_return.'.order_id = '.$this->orders.'.order_id');
		$q = $this->db->get($this->orders);
		return $q->result();
	}
	
	/* SALES AND COLLECTION UPDATE */
	function get_sold_items($msr_client_id,$month,$year) {
		$end =  date("Y-m-d", mktime(0,0,0,$month + 1,0,$year));
		$this->db->where('msr_client_id',$msr_client_id);
		$this->db->where("datetime BETWEEN '$year-$month-01' AND '".$end."'");
		$q = $this->db->get($this->orders);
		return $q->result();
	}
	/* SALES AND COLLECTION UPDATE */
	function get_collections($msr_client_id = '',$month = '',$year = '',$area = 0){
		if($month == '') 
			$month = date('m');
		if($year == '') 
			$year = date('Y');
			
		$end =  date("Y-m-d", mktime(0,0,0,$month + 1,0,$year));
		$this->db->where($this->order_pay.".datetime BETWEEN '$year-$month-01' AND '".$end."'");
		$this->db->join($this->orders,$this->orders.'.order_id = '.$this->order_pay.'.order_id');
		$this->db->join($this->user,$this->user.'.user_id = '.$this->orders.'.msr_id');
		$q = $this->db->get($this->order_pay);
		return $q->result();
	}
} 