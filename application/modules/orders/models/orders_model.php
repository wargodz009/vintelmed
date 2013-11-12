<?php

class Orders_model extends CI_Model{
var $table = 'orders';
var $batch = 'item_batch';
	function get_all($offset = 0,$limit = 0,$is_admin = true) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }   
		if($is_admin !== true) {
			$this->db->where('msr_id',$is_admin);
		}
		$this->db->order_by('status','asc');
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('order_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return $q->row()->$row;
		} else {
			return $q->row();
		}
	}
	function count_all($msr_id = false) {
		if($msr_id !== false) {
			$this->db->where('msr_id',$msr_id);
		}
		return $this->db->get($this->table)->num_rows();
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
		$this->db->where('order_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('order_id',$id);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function cancel($id) {
		$this->db->set('status','cancelled');
		$this->db->where('order_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
}