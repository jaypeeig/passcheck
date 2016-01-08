<?php

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

			$this->db->insert('issues', $data);

		}

		function querykey($key){
			//$key = md5($key);
			$query = $this->db->query("select * from passwords where passkeys = '{$key}'");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return NULL;
			}
		}


	}


?>