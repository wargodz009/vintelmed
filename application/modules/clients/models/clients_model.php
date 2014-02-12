<?php

class Clients_model extends CI_Model{
var $table = 'users';
	function get_all($offset = 0,$limit = 0) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }   
		$this->db->where('role_id',2);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('client_id',$id);
		$this->db->where('role_id',2);
		$q = $this->db->get($this->table);
		if($row != '') {
			return $q->row()->$row;
		} else {
			return $q->row();
		}
	}
	function count_all() {
		$this->db->where('role_id',2);
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
		$this->db->where('client_id',$id);
		$this->db->where('role_id',2);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('client_id',$id);
		$this->db->where('role_id',2);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete_admin($id) {
		$this->db->where('client_id',$id);
		$this->db->where('role_id',2);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
}