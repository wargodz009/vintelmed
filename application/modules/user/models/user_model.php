<?php

class User_model extends CI_Model{
var $table = 'users';
var $msr_tbl = 'msr_clients';
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
	function get_single($id,$in_username = false) {
		if($in_username === true) {
			$this->db->where('username',$id);
		} else {
			$this->db->where('user_id',$id);
		}
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
		$this->db->where('user_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->set('status','disabled');
		$this->db->where('user_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function activate($id) {
		$this->db->set('status','enabled');
		$this->db->where('user_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function is_assigned($msr_id,$client_id) {
		$this->db->where('msr_id',$msr_id);
		$this->db->where('client_id',$client_id);
		$Q = $this->db->get($this->msr_tbl);
		if($Q->num_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function assign($msr_id,$client_id){
		$this->db->insert($this->msr_tbl,array('msr_id'=>$msr_id,'client_id'=>$client_id));
		if($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function unassign($msr_id,$client_id){
		$this->db->where('msr_id',$msr_id);
		$this->db->where('client_id',$client_id);
		$this->db->delete($this->msr_tbl);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
}