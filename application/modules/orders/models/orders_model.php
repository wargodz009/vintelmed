<?php

class Orders_model extends CI_Model{
var $table = 'orders';
var $batch = 'item_batch';
var $order_details = 'order_details';
var $order_return = 'order_return';
var $order_pay = 'order_pay';
	function get_all($offset = 0,$limit = 0,$is_admin = true,$sign = false) {
	    if($offset != 0){
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }   
		if($is_admin !== true) {
			$this->db->where('msr_id',$is_admin);
		}
		if($sign == 'pre') {
			$this->db->where('gm_approve_pre',0);
			$this->db->where('status','approved');
		}
		if($sign == 'post') {
			$this->db->where('gm_approve_post',0);
			$this->db->where('gm_approve_pre !=',0);
			$this->db->where('status','completed');
		}
		$this->db->order_by('status','asc');
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_some($key,$val) {
		if($key == 'gm_approve_pre' || $key == 'gm_approve_post') {
			if($key == 'gm_approve_pre') {
				$this->db->where('gm_approve_pre',0);
				$this->db->having('status','approved');
			}
			if($key == 'gm_approve_post') {
				$this->db->where('gm_approve_pre !=',0);
				$this->db->where('gm_approve_post',0);
				$this->db->having('status','completed');
			}
		} else {
			$this->db->where($key,$val);
		}
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function get_single($id,$row = '') {
		$this->db->where('order_id',$id);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid Item');
		} else {
			return $q->row();
		}
	}
	function get_id_from_so($so,$row = 'order_id') {
		$this->db->where('form_number',$so);
		$q = $this->db->get($this->table);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid Item');
		} else {
			return $q->row();
		}
	}
	function get_order_details($id = 0) {
		$this->db->where('order_id',$id);
		$q = $this->db->get($this->order_details);
		return $q->result();
	}
	function is_exist_order_return($id = 0) {
		$this->db->where('order_id',$id);
		$q = $this->db->get($this->order_return);
		return $q->result();
	}
	function count_all($msr_id = false,$sign = false) {
		if($msr_id !== false) {
			$this->db->where('msr_id',$msr_id);
		}
		if($sign == 'pre') {
			$this->db->where('gm_approve_pre',0);
			$this->db->where('status','approved');
		}
		if($sign == 'post') {
			$this->db->where('gm_approve_post',0);
			$this->db->where('status','approved');
		}
		return $this->db->get($this->table)->num_rows();
	}
	function get_all_user($offset = 0,$limit = 0,$is_admin = true) {
	    if($offset != 0) {
            $this->db->offset($offset);
	    }
        if($limit != 0){
	        $this->db->limit($limit);
	    }  
		if($is_admin !== true) {
			$this->db->where('msr_client_id',$is_admin);
		}
		$this->db->order_by('status','asc');
		$q = $this->db->get($this->table);
		return $q->result();
	}
	function count_all_user($msr_id = false) {
		if($msr_id !== false) {
			$this->db->where('msr_client_id',$msr_id);
		}
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
		$this->db->where('order_id',$id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function sign($order_id,$user_id,$loc) {
		if($loc == 'pre') {
			$data = array('gm_approve_pre'=>$user_id);
		} else {
			$data = array('gm_approve_post'=>$user_id);
		}
		$this->db->where('order_id',$order_id);
		$this->db->update($this->table,$data);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function delete($id) {
		$this->db->where('order_id',$id);
		$this->db->delete($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function cancel($id) {
		$this->db->set('status','cancelled');
		$this->db->set('date_cancelled',date("Y-m-d"));
		$this->db->where('order_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function set_returned($id) {
		$this->db->set('status','returned');
		$this->db->set('date_cancelled',date("Y-m-d"));
		$this->db->where('order_id',$id);
		$this->db->update($this->table);
		if($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
	}
	function add($data) {
		$this->db->insert($this->order_details,$data);
		if($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function add_return($data) {
		$this->db->insert($this->order_return,$data);
		if($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function add_pay($data) {
		$this->db->insert($this->order_pay,$data);
		if($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	function get_details($id){
		$this->db->order_by('status','asc');
		$this->db->where('order_id',$id);
		$q = $this->db->get($this->order_details);
		return $q->result();
	}
	function get_paid($order_id) {
		$this->db->select_sum('amount');
		$this->db->where('order_id',$order_id);
		$q = $this->db->get($this->order_pay);
		return (@$q->row()->amount?$q->row()->amount:'0');
	}
	function get_item_pending_orders($item_id,$to_date){
		$this->db->select_sum('quantity');
		$this->db->where('status','pending');
		$this->db->where("DATE(datetime) <=",$to_date);
		$this->db->where("item_id",$item_id);
		$q = $this->db->get($this->table);
		return (@$q->row()->quantity?$q->row()->quantity:'0');
	}
	function get_order_all_details($order_id,$item_id,$row){ 
		$this->db->where('order_id',$order_id);
		$this->db->where('item_id',$item_id);
		$q = $this->db->get($this->order_details);
		if($row != '') {
			return (@$q->row()->$row?$q->row()->$row:'Invalid Item');
		} else {
			return $q->row();
		}
	}
}