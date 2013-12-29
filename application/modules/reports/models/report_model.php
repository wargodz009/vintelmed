<?php

class Report_model extends CI_Model{
var $table = 'reports';
var $items = 'items';
var $batch = 'item_batch';
var $suppliers = 'suppliers';
var $item_types = 'item_types';
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
	function get_inventory_items($type = 1){
		$this->db->select('*,'.$this->suppliers.'.name as supplier_name,'.$this->item_types.'.name as item_type_name');
		$this->db->join($this->suppliers,$this->suppliers.'.supplier_id = '.$this->batch.'.supplier_id');
		$this->db->join($this->items,$this->items.'.item_id = '.$this->batch.'.item_id');
		$this->db->join($this->item_types,$this->item_types.'.item_type_id = '.$this->items.'.item_type_id');
		$this->db->where($this->item_types.'.item_type_id',$type);
		$q = $this->db->get($this->batch);
		return $q->result();
	}
}