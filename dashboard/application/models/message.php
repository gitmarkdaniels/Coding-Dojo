<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Message extends CI_Model
	{
		public function create_message($message_info)
		{
			$query = "INSERT INTO messages (
							content, created_at,
							updated_at, user_id, wall_id
						)
						VALUES (?, now(), now(), ?, ?)";

			$message = array($message_info['message_content'],
								$message_info['user_id'],
								$message_info['wall_id']);

			$this->db->query($query, $values);

			return true;
		}

		public function get_messages($wall_id)
		{
			$query = "SELECT messages.id, messages.content, messages.created_at,
								users.first_name, users.last_name
						FROM walls
						LEFT JOIN users ON walls.users_id = users.id
						LEFT JOIN messages ON walls.id = messages.wall_id
						WHERE walls.id = ? AND messages.id IS NOT NULL";
			return $this->db->query($query, $wall_id)->result_array();
		}
	}
?>