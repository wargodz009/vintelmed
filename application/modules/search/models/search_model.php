<?php

class Search_model extends CI_Model{
var $user = 'users';
var $item = 'items';
	function get_user_by_key($key) {
		$this->db->like('first_name',$key);
		$this->db->or_like('last_name',$key);
		$this->db->or_like('username',$key);
		$this->db->or_like('email',$key);
		$this->db->where('role_id !=',2);
		$q = $this->db->get($this->user);
		return $q->result();
	}
	function get_item_by_key($key) {
		$this->db->like('name',$key);
		$this->db->or_like('generic_name',$key);
		$this->db->or_like('description',$key);
		$this->db->where('status','enabled');
		$q = $this->db->get($this->item);
		return $q->result();
	}
}