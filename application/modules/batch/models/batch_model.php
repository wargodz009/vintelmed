<?php

class Batch_model extends CI_Model{
var $table = 'item_batch';
	function get_all($offset = 0,$limit = 0) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    } 
		$this->db->where('deleted','0');		
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('item_batch_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid Item');
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
		$this->db->where('item_batch_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->set('deleted','1');
		$this->db->where('item_batch_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function get_batches($item_id) {
		$this->db->where('item_id',$item_id);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function increment($item_batch_id,$items){
		$this->db->where('item_batch_id', $item_batch_id);
		$this->db->set('sold_count', 'sold_count+'.$items, FALSE);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function decrement($item_batch_id,$items){
		$this->db->where('item_batch_id', $item_batch_id);
		$this->db->set('sold_count', 'sold_count-'.$items, FALSE);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
}