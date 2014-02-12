<?php

class Items_model extends CI_Model{
var $table = 'items';
var $batch = 'item_batch';
var $order = 'orders';

	function get_all($offset = 0,$limit = 0) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }   
		$this->db->where('status','enabled');
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('item_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid Item');
		} else {
			return $q->row();
		}
	}
	function get_some($key = 0,$val = 0) {
	    if(is_array($key)){
			foreach($key as $k=>$v){
				$this->db->where($k,$v);
			}
	    } else {
			$this->db->where($key,$val);
		}
		$this->db->where('status','enabled');
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function count_all() {
		$this->db->where('status','enabled');
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
		$this->db->where('item_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->set('status','disabled');
		$this->db->where('item_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function search($term,$toArray = false) {
		$this->db->where('status','enabled');
        $this->db->like('name',$term);
		$q = $this->db->get($this->table);
		if($toArray === false) {
			return $q->result();
		} else {
			return $q->result_array();
		}
	}
	function count_sold($item_id,$item_batch_id) {
		$this->db->select_sum('quantity');
		$this->db->where('item_id',$item_id);
		$this->db->where('item_batch_id',$item_batch_id);
		$this->db->where('status','completed');
		$q = $this->db->get($this->order);
		return ($q->row()->quantity?$q->row()->quantity:0);
	}
	function exists($params,$val = ''){
		if(is_array($params)) {
			foreach($params as $k=>$v){
				$this->db->where($k,$v);
			}
		} else {
			$this->db->where($params,$val);
		}
		$Q = $this->db->get($this->table);
		if($Q->num_rows()>0) {
			return true;
		} else {
			return false;
		}	
	}
}