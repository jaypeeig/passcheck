<?php
	header('Access-Control-Allow-Origin: *');
	class Passkeys extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function savekey($key){
			$key = md5($key);
			$data = array(
			   'passkeys' => $key
			);

			$this->db->insert('passwords', $data);

		}


		function save_event($key){
			
			$data = array(
			   'event' => $key
			);

			$this->db->insert('statistics', $data);

		}

		function querykey($key){
			$key = md5($key);
			$query = $this->db->query("select * from passwords where passkeys = '{$key}'");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return NULL;
			}
		}

		function countall(){
			$query = $this->db->query("select count(id) as total from statistics");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return NULL;
			}
		}

		function categorized($cat){
			$query = $this->db->query("select count(id) as total from statistics where event = '{$cat}'");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return NULL;
			}
		}


	}


?>