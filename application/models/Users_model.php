<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

		function authenticate($email, $password){
			$query = $this->db->query("SELECT * FROM `admin` where email='$email' AND password = '$password' " );
			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;
			}

			public function delete_user($resident_id) {
				$this->db->delete('resident', array('resident_id' => $resident_id));
		
				if ($this->db->affected_rows() > 0) {
					return true; // Deletion successful
				} else {
					return false; // No rows deleted
				}
			}

			function fetch_all($table){
				$query = $this->db->query("SELECT * FROM $table ");
				return $query->result();
	
			}
			
			public function get_list()
			{
				$search_query = $this->input->get('search_query');
				$this->db->select('*');
				$this->db->from('users');
	
				if (!empty($search_query)) {
					$this->db->like('field_name', $search_query);
					// Add other relevant search conditions
				}
	
				$query = $this->db->get();
				$list = $query->result();
	
				return $list;
			}

			public function getSettings() {
				$query = $this->db->get_where('admin_info', array('id' => 1));
				return $query->row_array();
			}
			
			public function set_update($table,$resident_id,$data) {
				$this->db->where('resident_id', $resident_id);
				$this->db->update($table, $data);
		
				return $this->db->affected_rows() > 0;
			}
	
			}
	
?>
