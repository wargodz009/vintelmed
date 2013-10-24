<?php

class Crud_model extends CI_Model{
var $table = 'cruds';
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
	function get_single($id) {
		$this->db->where('crud_id',$id);
		$q = $this->db->get($this->table);
		return $q->row();
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
		$this->db->where('crud_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('crud_id',$id);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
}