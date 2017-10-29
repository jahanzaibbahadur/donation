<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donation_model extends CI_Model{
	
	function get_receipts() {
		$this->db->from('receipts r');
		$this->db->join('users u', 'r.user_id = u.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_user_receipts($user_id) {
		$this->db->where('user_id');
		$query = $this->db->get('receipts');
		return $query->result();
	}
	
	function get_receipt($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('receipts');
		return $query->row();
	}
	
	function get_payment_profiles() {
		$query = $this->db->get('payment_profiles');
		return $query->result();
	}
	
	function get_user_payment_profiles($user_id) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('payment_profiles');
		return $query->result();
	}
	
	function get_payment_profile($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('payment_profiles');
		return $query->row();
	}
}