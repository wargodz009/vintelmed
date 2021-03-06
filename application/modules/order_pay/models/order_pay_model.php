<?php

class Order_pay_model extends CI_Model{
var $table = 'order_pay';
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
	function get_some($id,$offset = 0,$limit = 0,$count = false) {
		if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    } 
        $this->db->where('order_id',$id);
		$q = $this->db->get($this->table);
		if($count === true) {
			return $q->num_rows();
		} else {
			return $q->result();
		}
	}
	function get_single($id,$row = '') {
		$this->db->where('order_pay_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid order_pay');
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
		$this->db->where('order_pay_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('order_pay_id',$id);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function get_paid($order_id){
		$this->db->select_sum('amount');
		$this->db->where('order_id',$order_id);
		$Q = $this->db->get($this->table)->row();
		return (isset($Q->amount)?$Q->amount:0);
	}
}