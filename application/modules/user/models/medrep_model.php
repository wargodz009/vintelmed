<?php

class Medrep_model extends CI_Model {
	var $table = 'users';
	var $msr_tbl = 'msr_clients';
	function get_all($district_id = 0,$offset = 0,$limit = 0) {
		if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    } 
		if($district_id > 0) {
			$this->db->where('district_id',$district_id);
		}
		$this->db->where('role_id',3);
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_clients($user_id){
		$this->db->where('msr_id',$user_id);
		$q = $this->db->get($this->msr_tbl);
		return $q->result();
	}
	function get_msr_client_id($msr_id,$client_id){
		$this->db->where('msr_id',$msr_id);
		$this->db->where('client_id',$client_id);
		$q = $this->db->get($this->msr_tbl);
		return ($q->row()->msr_client_id?$q->row()->msr_client_id:'Invalid ID');
	}
	function get_msr_id($client_id,$msr_client_id){
		$this->db->where('client_id',$client_id);
		$this->db->where('msr_client_id',$msr_client_id);
		$q = $this->db->get($this->msr_tbl);
		return ($q->row()->msr_id?$q->row()->msr_id:'Invalid ID');
	}
	function get_msr_client_info($msr_client_id){
		$this->db->where('msr_client_id',$msr_client_id);
		$msr_client = $this->db->get($this->msr_tbl)->row();
		
		$this->db->where('user_id',$msr_client->msr_id);
		$data['msr_info'] = $this->db->get($this->table)->row();
		
		$this->db->where('user_id',$msr_client->client_id);
		$data['client_info'] = $this->db->get($this->table)->row();
		return $data;
	}
}