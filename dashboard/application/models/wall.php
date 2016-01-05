<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Wall extends CI_Model
	{
		public function show($user_id)
		{
			$query = "SELECT * FROM walls WHERE user_id = ?";
			$wall = $this->db->query($query, $user_id)->row_array();
			return $wall;
		}

		public function create($user_id)
		{
			$query = "INSERT INTO walls (user_id) VALUES (?)";
			return $this->db->query($query, $user_id);
		}
	}
?>