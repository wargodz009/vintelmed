<?php

class Medrep_model extends CI_Model {
var $table = 'users';
var $msr_tbl = 'msr_clients';
	function get_all() {
		$this->db->where('role_id',3);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_clients($user_id){
		$this->db->where('msr_id',$user_id);
		$q = $this->db->get($this->msr_tbl);
		return $q->result();
	}
}