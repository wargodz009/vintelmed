<?php

class Client_model extends CI_Model{
var $table = 'users';
var $msr_tbl = 'msr_clients';
	function get_all() {
		$this->db->where('role_id',2);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_medreps($user_id,$count = false){
		$this->db->where('client_id',$user_id);
		$q = $this->db->get($this->msr_tbl);
		if($count == true) {
			return $q->num_rows();
		} else {
			return $q->result();
		}
	}
	function get_clients($msr_id,$count = false,$offset = 0,$limit = false){
		$this->db->where('msr_id',$msr_id);
		if($count == true) {
			$q = $this->db->get($this->msr_tbl);
			return $q->num_rows();
		} else {
			if($offset != 0 && $limit != false) {
				$this->db->limit($limit);
				$this->db->offset($offset);
				$q = $this->db->get($this->msr_tbl);
			} else {
				$q = $this->db->get($this->msr_tbl);
			}
			return $q->result();
		}
	}
	function get_msr_client_id($msr_id,$client_id){
		$this->db->where('msr_id',$msr_id);
		$this->db->where('client_id',$client_id);
		$q = $this->db->get($this->msr_tbl);
		return (@$q->row()->msr_client_id?$q->row()->msr_client_id:'Invalid ID');
	}
	function get_client_id($msr_id,$msr_client_id){
		$this->db->where('msr_id',$msr_id);
		$this->db->where('msr_client_id',$msr_client_id);
		$q = $this->db->get($this->msr_tbl);
		return (@$q->row()->client_id?$q->row()->client_id:'Invalid ID');
	}
}