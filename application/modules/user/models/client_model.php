<?php

class Client_model extends CI_Model{
var $table = 'users';
var $msr_tbl = 'msr_clients';
	function get_all() {
		$this->db->where('role_id',2);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_medreps($user_id){
		$this->db->where('client_id',$user_id);
		$q = $this->db->get($this->msr_tbl);
		return $q->result();
	}
}